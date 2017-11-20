#!/bin/sh
GETIP=`curl -s http://dark-games.org.ua/ip.php`
CHECK_IFCONFIG=`ifconfig |grep $GETIP | cut -d: -f2 | awk '{ print $1}'`

DB_HOST="localhost"
DB_USER="trinity"
DB_PASSWD="trinity"
DB_NAME="auth"

LOGIN="admin"
PASSWORD="1234"
SHA1_PASSWORD=`echo -n "$LOGIN:$PASSWORD" | tr [:lower:] [:upper:] | sha1sum | awk '{print $1}'`

if [ -n "$CHECK_IFCONFIG" ]; then

mysql --host=$DB_HOST --user=$DB_USER --password=$DB_PASSWD $DB_NAME << EOF
UPDATE $DB_NAME.realmlist SET name='DARK-GAMES.ORG.UA', address='$CHECK_IFCONFIG', port='8085' WHERE id=1;
INSERT INTO $DB_NAME.account (username, sha_pass_hash) VALUES ('$LOGIN', '$SHA1_PASSWORD');
INSERT INTO $DB_NAME.account_access (id, gmlevel, RealmID) VALUES (1, 3, 1);
EOF

sed -i '/update.sh/d' /root/restart_all.sh
rm -f /root/update.sh
fi
