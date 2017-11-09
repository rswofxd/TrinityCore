#!/bin/bash
for i in `screen -ls |grep 'authserver' |awk '{print $1}'` ;  do screen -X -S $i quit ; done
screen -A -m -d -S authserver sudo -H -u server bash -c 'cd /home/server/wow/bin  && /home/server/wow/bin/authserver'
