
ARG BUILD_FROM
FROM $BUILD_FROM
#FROM debian:bookworm

# Set shell
SHELL ["/bin/bash", "-o", "pipefail", "-c"]

RUN apt-get update
RUN apt-get install -y git iptables procps network-manager iproute2 iw wpasupplicant net-tools
RUN apt-get install -y sudo mc hostapd qrencode dnsmasq jq lighttpd vnstat isoquery locales
RUN apt-get install -y dhcpcd5
RUN apt-get install -y python3
RUN apt-get install -y php8.2-cgi
RUN lighttpd-enable-mod fastcgi-php
RUN service lighttpd restart

RUN rm -Rf /var/www/html
RUN git clone https://github.com/RaspAP/raspap-webgui /var/www/html 
USER root
RUN mkdir -p /config/wifiap
RUN mkdir -p /config/wifiap/hostapd
RUN mkdir -p /config/wifiap/lighttpd
RUN mkdir -p /config/wifiap/backups
RUN mkdir -p /config/wifiap/networking
RUN mkdir -p /config/wifiap/dhcpcd
RUN mkdir -p /config/wifiap/dnsmasq
RUN mkdir -p /config/wifiap/system

COPY rootfs /
RUN chmod a+x /etc/cont-init.d/00-init

RUN chown -R www-data:www-data /var/www/html
RUN chown -R www-data:www-data /config/wifiap
RUN mv /var/www/html/installers/enablelog.sh /config/wifiap/hostapd
RUN mv /var/www/html/installers/disablelog.sh /config/wifiap/hostapd
RUN cp /home/servicestart.sh /config/wifiap/hostapd
RUN mv /var/www/html/installers/debuglog.sh /config/wifiap/system
RUN chown -c root:root /config/wifiap/hostapd/*.sh
RUN chmod 750 /config/wifiap/hostapd/*.sh
RUN chown -c root:root /config/wifiap/system/*.sh
RUN chmod 750 /config/wifiap/system/*.sh
RUN cp /home/configport.sh /config/wifiap/lighttpd
RUN chown -c root:root /config/wifiap/lighttpd/*.sh
RUN mv /etc/default/hostapd ~/default_hostapd.old
#cp /etc/hostapd/hostapd.conf ~/hostapd.conf.old
RUN cp /var/www/html/config/hostapd.conf /config/wifiap/hostapd/hostapd.conf
RUN cp /var/www/html/config/dhcpcd.conf /config/wifiap/dhcpcd/dhcpcd.conf
RUN cp /home/090_raspap.conf /config/wifiap/dnsmasq/090_raspap.conf
RUN cp /home/090_wlan0.conf /config/wifiap/dnsmasq/090_wlan0.conf
RUN cp /var/www/html/config/defaults.json /config/wifiap/networking/
RUN cp /var/www/html/config/raspap-bridge-br0.netdev /etc/systemd/network/raspap-bridge-br0.netdev
RUN cp /var/www/html/config/raspap-br0-member-eth0.network /etc/systemd/network/raspap-br0-member-eth0.network

#COPY run.sh /
#RUN chmod a+x /run.sh
#CMD [ "/run.sh" ]