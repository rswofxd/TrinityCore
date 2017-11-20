#!/bin/sh
GETIP=`curl -s http://dark-games.org.ua/ip.php`
CHECK_IFCONFIG=`ifconfig |grep $GETIP | cut -d: -f2 | awk '{ print $1}'`

DB_HOST="localhost"
DB_USER="trinity"
DB_PASSWD="trinity"
DB_NAME="auth"

LOGIN="admin"
EMAIL="evgeniy@kolesnyk.ru"
PASSWORD="1234"
REALMLIST="DARK-GAMES.ORG.UA"


if [ -n "$CHECK_IFCONFIG" ]; then
SHA1_PASSWORD=`echo -n "$LOGIN:$PASSWORD" | tr [:lower:] [:upper:] | sha1sum | awk '{print $1}'`
mysql --host=$DB_HOST --user=$DB_USER --password=$DB_PASSWD $DB_NAME << EOF
UPDATE $DB_NAME.realmlist SET name='$REALMLIST', address='$CHECK_IFCONFIG', port='8085' WHERE id=1;
INSERT INTO $DB_NAME.account (username, email, sha_pass_hash) VALUES ('$LOGIN', '$EMAIL', '$SHA1_PASSWORD');
INSERT INTO $DB_NAME.account_access (id, gmlevel, RealmID) VALUES (1, 3, 1);
EOF
sed -i '/update.sh/d' /root/restart_all.sh
rm -f /root/update.sh
fi
