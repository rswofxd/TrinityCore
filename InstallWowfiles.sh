#!/bin/bash

mkdir vmaps

cp /home/server/wow/bin/mapextractor /wow
cp /home/server/wow/bin/mmaps_generator /wow
cp /home/server/wow/bin/vmap4assembler /wow/vmaps
cp /home/server/wow/bin/vmap4extractor /wow/vmaps

cd /wow

./mapextractor
cd vmaps
./vmap4extractor -d /wow/Data
./vmap4assembler Buildings vmaps
cd /wow
mkdir mmaps
./mmaps_generator

echo Moving generated files from /wow to /config/wowfiles
echo This may take a while.

mkdir /config/wowfiles
mkdir /config/mangoslogs

mv /wow/mmaps /config/wowfiles
mv /wow/vmaps /config/wowfiles
mv /wow/maps /config/wowfiles
mv /wow/dbc /config/wowfiles

mkdir /home/server/wow/data

ln -s /config/wowfiles/mmaps /home/server/wow/data
ln -s /config/wowfiles/vmaps /home/server/wow/data
ln -s /config/wowfiles/maps /home/server/wow/data
ln -s /config/wowfiles/dbc /home/server/wow/data

mkdir /config/wowconfig/

if [ ! -f /config/wowconfig/worldserver.conf ]; then
   cp /install/worldserver.conf /config/wowconfig
fi

if [ ! -f /config/wowconfig/authserver.conf ]; then
   cp /install/authserver.conf /config/wowconfig
fi


echo Script Finished
echo If you want, you can recreate this container without the /wow mapping / world of warcraft installation directory
echo The needed files are now present in the /config directory.
