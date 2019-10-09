#!/bin/bash
/etc/init.d/apache2 restart
/etc/init.d/mysql restart
/home/server/wow/restart_authserver.sh
/home/server/wow/restart_worldserver.sh
