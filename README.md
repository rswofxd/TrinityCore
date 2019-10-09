# TrinityCore
Doker MariaDB with TrinityCore
Automatically will be install the necessary software to launch its own World of Warcraft server. Source code TrinityCore, maps, databases and compiled kernel will be load and automatically configured.

contains:
```
auth server
world server
mariadb for databases
nginx for web registration pages.
```

up and running with 2 simple scripts
run the container like this.


```
docker run \
--name=wotlk \  #you can chose your own name here
-d \ #run as daemon
-p 80:80 \ #nginx web port
-p 8085:8085 \ #worldserver port
-p 3724:3724 \ #authserver port
-p 3443:3443 \ #Remote Admin port
-e PUID=0 -e PGID=0 \ #root
-e WAN_IP_ADDRESS=127.0.0.1 \ #if you want to port forward for external connection, change to your internet ip address. this address can be updated by running /install/InstallDatabases.sh
-e DOCKER_HOST_IP=192.168.1.210 \ #ip address of your docker host
-e MYSQL_ROOT_PASSWORD=trinity-db-pass \ #root password of database
-e TZ=Europe/Paris \ #timezone of your docker host
-v /your/location/your-wow-3.3.5a-client:/wow \ #location to your wow client.
-v /your/location/config:/config \ #location where config files are stored
--restart always \ #automatically start when docker host restarts
brouzuf/trinitycore-wotlk
```

when it's running type the following in your prompt
```
docker exec -it wotlk /bin/bash
```
Now you will be connected to the docker container.

```
/install/InstallDatabases.sh
```
This will generate the database in the mariadb database

```
/install/InstallWowfiles.sh
```
This will generate the DBC, MAPS, MMAPS, VMAPS.
And they will be moved to your /config directory !

Browse to yourdockerip:80 and setup the registration page

If you have chosen a different password as root sql password, edit your authserver.conf and worldserver.conf in your /config/wowfiles directory
```
docker restart wotlk
```
Now everything is done.

You will have a working TrinityCore 3.3.5 up and running in a docker container.

Every file is linked and/or moved to the /config directory so settings, wowfiles, databases, will persist container destruction or upgrades.

this is an automated build, which will automatically build the latest version of TrinityCore 3.3.5.

Automatic database upgrades on startup is in the works.

# Remote Admin
You need to have a GM level 3 account to access the remote admin port.
Create one the following way.

```
docker exec -it wotlk /home/server/bin/worldserver -c /config/wowconfig/console.conf
```

This will run a mangos config on another port with console enabled.
Essentially connecting you to the mangos console.
You can do this while your production mangos is running. 

Now create your GM account (or just elevate your current account)

```
account create gmadmin Y0UB4HDSTR0NGP4SSW0RD
account set gmlevel gmadmin 3
```

*// You can now connect with telnet to port 3443 with your gm account for abuse of GM power ;) //
