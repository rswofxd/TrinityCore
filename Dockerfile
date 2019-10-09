FROM linuxserver/mariadb
MAINTAINER admin <brouzuf@gmail.com> 

RUN apt-get --assume-yes update && apt-get --assume-yes upgrade && \
    apt-get --assume-yes install build-essential gcc g++ automake git autoconf make patch \
  libmysql++-dev libtool libssl-dev grep binutils zlibc libc6 libbz2-dev cmake subversion p7zip-full \
  libboost-all-dev mysql-client-5.6 screen libace-dev libmysqlclient-dev clang libreadline-dev libncurses-dev && \
  update-alternatives --install /usr/bin/cc cc /usr/bin/clang 100 && \
  update-alternatives --install /usr/bin/c++ c++ /usr/bin/clang 100

RUN useradd -ms /bin/bash server && \
    mkdir -p /home/server/wow && mkdir -p /home/server/source && \
    cd /home/server/source && git clone -b 3.3.5 git://github.com/TrinityCore/TrinityCore.git  && mkdir -p /home/server/source/TrinityCore/build && \
    cd /home/server/source/TrinityCore/build && cmake ../ -DCMAKE_INSTALL_PREFIX=/home/server/wow -DCONF_DIR=/home/server/wow/conf -DTOOLS=1 && \
    make && make install

RUN curl -o /home/server/source/TrinityCore/sql/base/TDB_full_world_335.19071_2019_07_15.7z https://raw.githubusercontent.com/TrinityCore/TrinityCoreDatabases/master/3.3.5/TDB_full_world_335.19071_2019_07_15.7z && \
    cd /home/server/source/TrinityCore/sql/base && 7z e TDB_full_world_335.19071_2019_07_15.7z

RUN apt-get --assume-yes install git-core nginx php7.2-fpm php7.2-xml php7.2-mysqli php7.2-gd

RUN git clone https://github.com/brouzuf/TrinityCore.git /install --recursive -b master && \
rm -rf /var/www/html && \
mkdir /etc/services.d/worldserver && \
mkdir /etc/services.d/authserver && \
mkdir /etc/services.d/nginx && \
mkdir /etc/services.d/php7.2-fpm && \
mkdir /run/php && \
mkdir /var/www/html && \
#cp /install/TrinityWeb/* /var/www/html -R && \
cp /install/servicemangosd /etc/services.d/worldserver/run && \
cp /install/servicerealmd /etc/services.d/authserver/run && \
cp /install/servicenginx /etc/services.d/nginx/run && \
cp /install/servicephp-fpm /etc/services.d/php7.2-fpm/run && \
#cp /install/50-preptrinity /etc/cont-init.d && \
#cp /install/60-preptrinityweb /etc/cont-init.d && \
cp /install/nginxdefaultconfig /etc/nginx/sites-enabled/default && \
chmod +x /install/InstallTrinity.sh && \
chmod +x /install/InstallDatabase.sh && \
chmod +x /install/InstallWowfiles.sh && \
chmod +x /install/UpdateWanIP.sh && \
#chmod +x /etc/cont-init.d/50-preptrinity && \
#chmod +x /etc/cont-init.d/60-preptrinityweb && \
#rm -rf /install/TrinityWeb && \
cp /install/restart_authserver.sh /home/server/wow/restart_authserver.sh && \
cp /install/restart_worldserver.sh /home/server/wow/restart_worldserver.sh &&\
mkdir /home/server/wow/etc && \
cp /install/authserver.conf /home/server/wow/etc/authserver.conf && \
cp /install/worldserver.conf /home/server/wow/etc/worldserver.conf && \


