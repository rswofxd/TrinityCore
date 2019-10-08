#!/bin/sh

svr="localhost"
user="root"
pass=$MYSQL_ROOT_PASSWORD
port="3306"
wdb="world"
cdb="characters"
rdb="auth"

    mysql <  && \
    mysql auth <  && \
    mysql characters <  && \
    mysql world < 
    
createCharDB()
{
	printf "Creating databases ${cdb} ${rdb} ${wdb}\n"
	mysql -u $user -p$pass -q -s -e < /home/server/source/TrinityCore/sql/create/create_mysql.sql
}

populateWorldDB()
{
	printf "Importing World database ${wdb}\n"
	mysql -u $user -p$pass -q -s ${wdb} < /home/server/source/TrinityCore/sql/base/TDB_full_world_335.19071_2019_07_15.sql
}

populateAuthDB()
{
	printf "Importing Auth database ${rdb}\n"
	mysql -u $user -p$pass -q -s ${rdb} < /home/server/source/TrinityCore/sql/base/auth_database.sql
}

populateCharacterDB()
{
	printf "Importing Characters database ${cdb}\n"
	mysql -u $user -p$pass -q -s ${cdb} < /home/server/source/TrinityCore/sql/base/characters_database.sql
}

updateCharDB()
{
	printf "Updating data into the character database ${cdb}\n"
	for file in $(ls /home/server/source/TrinityCore/sql/updates/characters/3.3.5/*.sql | tr ' ' '|' | tr '\n' ' ')
	do
		file=$(echo ${file} | tr '|' ' ')
		printf "Applying update ${file}\n"
		mysql -u $user -p$pass -q -s ${cdb} < ${file}
	done
}

updateWorldDB()
{
	printf "Updating data into the character database ${wdb}\n"
	for file in $(ls /home/server/source/TrinityCore/sql/updates/world/3.3.5/*.sql | tr ' ' '|' | tr '\n' ' ')
	do
		file=$(echo ${file} | tr '|' ' ')
		printf "Applying update ${file}\n"
		mysql -u $user -p$pass -q -s ${wdb} < ${file}
	done
}

updateAuthDB()
{
	printf "Updating data into the character database ${rdb}\n"
	for file in $(ls /home/server/source/TrinityCore/sql/updates/auth/3.3.5/*.sql | tr ' ' '|' | tr '\n' ' ')
	do
		file=$(echo ${file} | tr '|' ' ')
		printf "Applying update ${file}\n"
		mysql -u $user -p$pass -q -s ${rdb} < ${file}
	done
}

#addRealmList()
#{
#	printf "Adding realm list entries\n"
#	mysql -u $user -p$pass -q -s ${rdb} < /database/Tools/updateRealm.sql
#}

    
