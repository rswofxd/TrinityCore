#!/bin/sh
GETIP=`curl -s http://dark-games.org.ua/ip.php`
CHECK_IFCONFIG=`ifconfig |grep $GETIP | cut -d: -f2 | awk '{ print $1}'`

DB_HOST="localhost"
DB_USER="trinity"
DB_PASSWD="trinity"
DB_NAME="auth"

if [ -n "$CHECK_IFCONFIG" ]; then

mysql --host=$DB_HOST --user=$DB_USER --password=$DB_PASSWD $DB_NAME << EOF
UPDATE $DB_NAME.realmlist SET name='DARK-GAMES.ORG.UA', address='$CHECK_IFCONFIG', port='8085' WHERE id=1;
INSERT INTO $DB_NAME.account (username, sha_pass_hash) VALUES ('admin', 'd13fcd1b568d81a7f4d55ec614dfa4b3d21641a2');
INSERT INTO $DB_NAME.account_access (id, gmlevel, RealmID) VALUES (1, 3, 1);
EOF

sed -i '/update.sh/d' /root/restart_all.sh
rm -f /root/update.sh
fi
