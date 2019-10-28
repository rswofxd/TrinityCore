FROM debian:buster
MAINTAINER admin <brouzuf@gmail.com> 

RUN apt-get --assume-yes update && apt-get --assume-yes upgrade && \
    apt-get --assume-yes install git clang cmake make gcc g++ libmariadbclient-dev \
    libssl-dev libbz2-dev libreadline-dev libncurses-dev libboost-all-dev mariadb-server \
    p7zip default-libmysqlclient-dev && \
  update-alternatives --install /usr/bin/cc cc /usr/bin/clang 100 && \
  update-alternatives --install /usr/bin/c++ c++ /usr/bin/clang 100

RUN useradd -ms /bin/bash server && \
    mkdir -p /home/server/wow && mkdir -p /home/server/source && \
    cd /home/server/source && git clone -b 3.3.5 git://github.com/TrinityCore/TrinityCore.git  && mkdir -p /home/server/source/TrinityCore/build && \
    cd /home/server/source/TrinityCore/build && cmake ../ -DCMAKE_INSTALL_PREFIX=/home/server/wow -DCONF_DIR=/home/server/wow/conf -DTOOLS=1 && \
    make && make install

RUN apt-get --assume-yes install php nginx php7.2-fpm php7.2-xml php7.2-mysqli php7.2-gd \
    libace-dev libapache2-mod-php php-common php-mbstring php-xmlrpc php-soap php-gd php-xml \
    php-mysql php-cli php-zip php-dev libmcrypt-dev php-pear curl

RUN curl -o /home/server/source/TrinityCore/sql/base/TDB_full_world_335.19071_2019_07_15.7z https://raw.githubusercontent.com/TrinityCore/TrinityCoreDatabases/master/3.3.5/TDB_full_world_335.19071_2019_07_15.7z && \
    cd /home/server/source/TrinityCore/sql/base && 7z e TDB_full_world_335.19071_2019_07_15.7z

RUN git clone https://github.com/brouzuf/TrinityCore.git /install --recursive -b master && \
rm -rf /var/www/html && \
mkdir /var/www/html && \
cp /install/trinityweb/* /var/www/html -R && \
rm -rf /install/trinityweb

RUN mkdir /etc/services.d/worldserver && \
mkdir /etc/services.d/authserver && \
mkdir /etc/services.d/nginx && \
mkdir /etc/services.d/php7.2-fpm && \
mkdir /run/php && \
cp /install/servicemangosd /etc/services.d/worldserver/run && \
cp /install/servicerealmd /etc/services.d/authserver/run && \
cp /install/servicenginx /etc/services.d/nginx/run && \
cp /install/servicephp-fpm /etc/services.d/php7.2-fpm/run && \
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
