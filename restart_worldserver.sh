#!/bin/bash
for i in `screen -ls |grep 'worldserver' |awk '{print $1}'` ;  do screen -X -S $i quit ; done
screen -A -m -d -S worldserver sudo -H -u server bash -c 'cd /home/server/wow/bin && /home/server/wow/bin/worldserver'
