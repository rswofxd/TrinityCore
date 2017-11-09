#!/bin/bash
debconf-set-selections <<< 'mysql-server mysql-server/root_password password dark-games.org.ua'
debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password dark-games.org.ua'
apt-get update
apt-get install -y mysql-server
echo "[client]" > /root/.my.cnf
echo "host = localhost" >> /root/.my.cnf
echo "user = root" >> /root/.my.cnf
echo "password = dark-games.org.ua" >> /root/.my.cnf
/etc/init.d/mysql restart
curl -o /home/server/source/TrinityCore/sql/base/TDB_full_world_335.63_2017_04_18.sql http://dark-games.org.ua/files/wow3.3.5a/TDB_full_world_335.63_2017_04_18.sql
mysql < /home/server/source/TrinityCore/sql/create/create_mysql.sql
mysql auth < /home/server/source/TrinityCore/sql/base/auth_database.sql
mysql characters < /home/server/source/TrinityCore/sql/base/characters_database.sql
mysql world < /home/server/source/TrinityCore/sql/base/TDB_full_world_335.63_2017_04_18.sql
/etc/init.d/mysql stop
