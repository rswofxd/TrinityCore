FROM linuxserver/mariadb
MAINTAINER admin <brouzuf@gmail.com> 

RUN apt-get --assume-yes update && apt-get --assume-yes upgrade && \
    apt-get --assume-yes install build-essential gcc g++ automake git autoconf make patch \
  libmysql++-dev libtool libssl-dev grep binutils zlibc libc6 libbz2-dev cmake subversion p7zip \
  libboost-all-dev mysql-client-5.6 screen libace-dev libmysqlclient-dev clang libreadline-dev libncurses-dev && \
  update-alternatives --install /usr/bin/cc cc /usr/bin/clang 100 && \
  update-alternatives --install /usr/bin/c++ c++ /usr/bin/clang 100

RUN useradd -ms /bin/bash server
RUN mkdir -p /home/server/wow && mkdir -p /home/server/source
RUN cd /home/server/source && git clone -b 3.3.5 git://github.com/TrinityCore/TrinityCore.git  && mkdir -p /home/server/source/TrinityCore/build
RUN cd /home/server/source/TrinityCore/build && cmake ../ -DCMAKE_INSTALL_PREFIX=/home/server/wow -DCONF_DIR=/home/server/wow/conf -DTOOLS=1

COPY setup-mysql.sh /root/setup-mysql.sh
RUN chmod +x /root/setup-mysql.sh
RUN /root/setup-mysql.sh
RUN rm -f /root/setup-mysql.sh

#RUN curl -o /home/server/wow.tar.gz http://dark-games.org.ua/files/wow3.3.5a/wow.tar.gz
#RUN tar -xvzf /home/server/wow.tar.gz -C /home/server && rm -f /home/server/wow.tar.gz
#RUN mv /home/server/wow/etc/authserver.conf.dist /home/server/wow/etc/authserver.conf
#RUN mv /home/server/wow/etc/worldserver.conf.dist /home/server/wow/etc/worldserver.conf
#RUN curl -o /home/server/wow/bin/maps.tar http://dark-games.org.ua/files/wow3.3.5a/maps.tar
#RUN cd /home/server/wow/bin && tar -xvf maps.tar && rm -f maps.tar

#RUN curl -o /var/www/html/reg.tar http://dark-games.org.ua/files/wow3.3.5a/reg.tar
#RUN cd /var/www/html &&  echo "<head><meta http-equiv='refresh' content='0; url=/index.php' /></head>" > /var/www/html/index.html && tar -xvf reg.tar && rm -f /var/www/html/reg.tar

COPY restart_authserver.sh /home/server/wow/restart_authserver.sh
COPY restart_worldserver.sh /home/server/wow/restart_worldserver.sh
COPY update.sh /root/update.sh
COPY restart_all.sh /root/restart_all.sh
RUN chmod +x /home/server/wow/restart_authserver.sh
RUN chmod +x /home/server/wow/restart_worldserver.sh
RUN chmod +x /root/update.sh
RUN chmod +x /root/restart_all.sh

EXPOSE 22 3306 3724 8085
ENTRYPOINT /root/restart_all.sh
