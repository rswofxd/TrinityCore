cd /home/server/source
echo "Pull latest code in Github..."
git pull origin 3.3.5
cd /home/server/source/TrinityCore/build
echo "Build !!"
cmake ../ -DCMAKE_INSTALL_PREFIX=/home/server/wow -DCONF_DIR=/home/server/wow/conf -DTOOLS=1
make && make install
