
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

RUN sudo mkdir -p /config/wifiap/
RUN sudo mkdir -p /config/wifiap/backups
RUN sudo mkdir -p /config/wifiap/networking
RUN sudo mkdir -p /config/wifiap/hostapd
RUN sudo mkdir -p /config/wifiap/dhcpcd
RUN sudo mkdir -p /config/wifiap/dnsmasq
RUN sudo mkdir -p /config/wifiap/lighttpd
RUN sudo mkdir -p /config/wifiap/system

COPY rootfs /
RUN chmod a+x /etc/cont-init.d/00-init
#COPY run.sh /
#RUN chmod a+x /run.sh
#CMD [ "/run.sh" ]