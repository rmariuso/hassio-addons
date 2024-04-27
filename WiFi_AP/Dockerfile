
ARG BUILD_FROM
FROM $BUILD_FROM

# Set shell
SHELL ["/bin/bash", "-o", "pipefail", "-c"]

RUN apt-get update
RUN apt-get install -y git iptables procps network-manager iproute2 iw wpasupplicant net-tools
RUN apt-get install -y sudo mc hostapd qrencode dnsmasq jq lighttpd vnstat isoquery locales
RUN apt-get install -y dhcpcd5 python3
RUN apt-get install -y php8.2-cgi
#RUN lighttpd-enable-mod fastcgi-php
#RUN service lighttpd restart

RUN rm -Rf /var/www/html
RUN git clone https://github.com/RaspAP/raspap-webgui /var/www/html 
COPY /rootfs /
#RUN WEBROOT="/var/www/html"
#RUN CONFSRC="$WEBROOT/config/50-raspap-router.conf"
#RUN LTROOT=$(grep "server.document-root" /etc/lighttpd/lighttpd.conf | awk -F '=' '{print $2}' | tr -d " \"")
#RUN HTROOT=${WEBROOT/$LTROOT}
#RUN HTROOT=$(echo "$HTROOT" | sed -e 's/\/$//')
#RUN awk "{gsub(\"/REPLACE_ME\",\"$HTROOT\")}1" $CONFSRC > /tmp/50-raspap-router.conf
#RUN sudo cp /tmp/50-raspap-router.conf /etc/lighttpd/conf-available/
#RUN sudo ln -s /etc/lighttpd/conf-available/50-raspap-router.conf /etc/lighttpd/conf-enabled/50-raspap-router.conf
   
#RUN sudo mkdir -p /config/wifiap/
#RUN sudo mkdir /config/wifiap/backups
#RUN sudo mkdir /config/wifiap/networking
#RUN sudo mkdir /config/wifiap/hostapd
#RUN sudo mkdir /config/wifiap/dhcpcd
#RUN sudo mkdir /config/wifiap/dnsmasq
#RUN sudo mkdir /config/wifiap/lighttpd
#RUN sudo mkdir /config/wifiap/system

    #RUN chmod a+x /etc/cont-init.d/*

#VOLUME [ "/sys/fs/cgroup" ]

COPY run.sh /
RUN chmod a+x /run.sh
CMD [ "/run.sh" ]