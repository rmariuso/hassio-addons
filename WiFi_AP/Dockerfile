
ARG BUILD_FROM
FROM $BUILD_FROM

# Set shell
SHELL ["/bin/bash", "-o", "pipefail", "-c"]

RUN apt-get update
RUN apt-get install -y git iptables procps network-manager iproute2 iw wpasupplicant net-tools
RUN apt-get install -y sudo mc hostapd qrencode dnsmasq jq lighttpd vnstat isoquery locales
RUN apt-get install -y dhcpcd5 python3
RUN apt-get install -y php8.2-cgi
RUN lighttpd-enable-mod fastcgi-php
RUN service lighttpd restart

RUN rm -Rf /var/www/html
RUN git clone https://github.com/RaspAP/raspap-webgui /var/www/html 
COPY /rootfs /
RUN WEBROOT="/var/www/html" \
    CONFSRC="$WEBROOT/config/50-raspap-router.conf" \
    LTROOT=$(grep "server.document-root" /etc/lighttpd/lighttpd.conf | awk -F '=' '{print $2}' | tr -d " \"") \
    HTROOT=${WEBROOT/$LTROOT} \
    HTROOT=$(echo "$HTROOT" | sed -e 's/\/$//') \
    awk "{gsub(\"/REPLACE_ME\",\"$HTROOT\")}1" $CONFSRC > /tmp/50-raspap-router.conf \
    sudo cp /tmp/50-raspap-router.conf /etc/lighttpd/conf-available/ \
    sudo ln -s /etc/lighttpd/conf-available/50-raspap-router.conf /etc/lighttpd/conf-enabled/50-raspap-router.conf
   
RUN sudo mkdir /config/wifiap/ \
    sudo mkdir /config/wifiap/backups \
    sudo mkdir /config/wifiap/networking \
    sudo mkdir /config/wifiap/hostapd \
    sudo mkdir /config/wifiap/dhcpcd \
    sudo mkdir /config/wifiap/dnsmasq \
    sudo mkdir /config/wifiap/lighttpd \
    sudo mkdir /config/wifiap/system \
    sudo chown -R www-data:www-data /var/www/html \
    sudo chown -R www-data:www-data /config/wifiap \
    sudo mv /var/www/html/installers/enablelog.sh /config/wifiap/hostapd \
    sudo mv /var/www/html/installers/disablelog.sh /config/wifiap/hostapd \
    sudo mv /var/www/html/installers/servicestart.sh /config/wifiap/hostapd \
    sudo mv /var/www/html/installers/debuglog.sh /config/wifiap/system \
    sudo chown -c root:root /config/wifiap/hostapd/*.sh \
    sudo chmod 750 /config/wifiap/hostapd/*.sh \
    sudo chown -c root:root /config/wifiap/system/*.sh \
    sudo chmod 750 /config/wifiap/system/*.sh \
    sudo cp /var/www/html/installers/configport.sh /config/wifiap/lighttpd \
    sudo chown -c root:root /config/wifiap/lighttpd/*.sh \
    sudo mv /etc/default/hostapd ~/default_hostapd.old \
    sudo cp /etc/hostapd/hostapd.conf ~/hostapd.conf.old \
    sudo cp /var/www/html/config/hostapd.conf /config/wifiap/hostapd/hostapd.conf \
    sudo cp /var/www/html/config/dhcpcd.conf /config/wifiap/dhcpcd/dhcpcd.conf \
    sudo cp /var/www/html/config/defaults.json /config/wifiap/networking/ \
    sudo cp /var/www/html/config/raspap-bridge-br0.netdev /etc/systemd/network/raspap-bridge-br0.netdev \
    sudo cp /var/www/html/config/raspap-br0-member-eth0.network /etc/systemd/network/raspap-br0-member-eth0.network

    #RUN chmod a+x /etc/cont-init.d/*

#VOLUME [ "/sys/fs/cgroup" ]

COPY run.sh /
RUN chmod a+x /run.sh
CMD [ "/run.sh" ]