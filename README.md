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

# Account Creation:
Next create your Login Account by typing directly into the worldserver window the GM Command account create. Syntax: (see examples below)

If you wish to set the account as a GM then type into the worldserver window: account set gmlevel $account #level #realmid where $account is the account name to change, #level can be 0-3 and #realmid is the realm ID. Setting a #level of "3" is GM account level (higher numbers = more access), and the "-1" is the realm ID that stands for "all realms".
You need to have a GM level 3 account to access the remote admin port.
To create your account: very important, don't use @ on account names.
```
...
```

Now create your GM account (or just elevate your current account)
```
account create <user> <pass>
```
Example: account create test test


To set your account level:
```
account set gmlevel <user> 3 -1
```
Example: account set gmlevel test 3 -1

Login to your account:
Log in with account test and password test through wow.exe.
