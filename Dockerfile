FROM debian:buster
MAINTAINER admin <brouzuf@gmail.com> 

RUN apt-get --assume-yes update && apt-get --assume-yes upgrade && \
    apt-get --assume-yes install git clang cmake make gcc g++ libmariadbclient-dev \
    libssl-dev libbz2-dev libreadline-dev libncurses-dev libboost-all-dev mariadb-server gnupg2 \
    p7zip default-libmysqlclient-dev && \
  update-alternatives --install /usr/bin/cc cc /usr/bin/clang 100 && \
  update-alternatives --install /usr/bin/c++ c++ /usr/bin/clang 100

RUN useradd -ms /bin/bash server && \
    mkdir -p /home/server/wow && mkdir -p /home/server/source && \
    cd /home/server/source && git clone -b 3.3.5 git://github.com/TrinityCore/TrinityCore.git  && mkdir -p /home/server/source/TrinityCore/build && \
    cd /home/server/source/TrinityCore/build && cmake ../ -DCMAKE_INSTALL_PREFIX=/home/server/wow -DCONF_DIR=/home/server/wow/conf -DTOOLS=1 && \
    make && make install

RUN git clone https://github.com/brouzuf/TrinityCore.git /install --recursive -b master && \
cp /install/nginx.list /etc/apt/sources.list.d/nginx.list && \
#rm -rf /var/www/html && \
mkdir /var/www && \
cp /install/trinityweb/* /var/www/html -R && \
rm -rf /install/trinityweb

RUN wget https://nginx.org/keys/nginx_signing.key && apt-key add nginx_signing.key && \
    apt-get --assume-yes update

RUN apt-get --assume-yes install nginx php7.3-fpm php7.3-gd php7.3-mysql php7.3-curl php7.3-imap php7.3-mbstring php7.3-xml \
    libace-dev php-zip libmcrypt-dev php-pear curl

RUN curl -o /home/server/source/TrinityCore/sql/base/TDB_full_world_335.19071_2019_07_15.7z https://raw.githubusercontent.com/TrinityCore/TrinityCoreDatabases/master/3.3.5/TDB_full_world_335.19071_2019_07_15.7z && \
    cd /home/server/source/TrinityCore/sql/base && 7z e TDB_full_world_335.19071_2019_07_15.7z

RUN mkdir /etc/services.d/worldserver && \
mkdir /etc/services.d/authserver && \
mkdir /etc/services.d/nginx && \
mkdir /etc/services.d/php7.3-fpm && \
mkdir /run/php && \
cp /install/servicemangosd /etc/services.d/worldserver/run && \
cp /install/servicerealmd /etc/services.d/authserver/run && \
cp /install/servicenginx /etc/services.d/nginx/run && \
cp /install/servicephp-fpm /etc/services.d/php7.3-fpm/run && \
cp /install/50-preptrinity /etc/cont-init.d && \
cp /install/60-preptrinityweb /etc/cont-init.d && \
cp /install/nginxdefaultconfig /etc/nginx/sites-enabled/default && \
chmod +x /install/InstallTrinity.sh && \
chmod +x /install/InstallDatabase.sh && \
chmod +x /install/InstallWowfiles.sh && \
chmod +x /install/UpdateWanIP.sh && \
chmod +x /etc/cont-init.d/50-preptrinity && \
chmod +x /etc/cont-init.d/60-preptrinityweb && \
mkdir /home/server/wow/etc && \
cp /install/authserver.conf /home/server/wow/etc/authserver.conf && \
cp /install/worldserver.conf /home/server/wow/etc/worldserver.conf
