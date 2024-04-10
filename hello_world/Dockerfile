
ARG BUILD_FROM
FROM $BUILD_FROM

# Set shell
SHELL ["/bin/bash", "-o", "pipefail", "-c"]

RUN apt-get update
RUN apt-get install -y git iptables procps iproute2 iw wpasupplicant net-tools
RUN apt-get install -y sudo mc hostapd qrencode dnsmasq jq lighttpd vnstat isoquery locales
RUN apt-get install -y dhcpcd5
RUN apt-get install -y php8.2-cgi

RUN rm -Rf /var/www/html
RUN git clone https://github.com/RaspAP/raspap-webgui /var/www/html 
 
COPY /rootfs /
#WORKDIR /data
#COPY run.sh /
#COPY 00-init /
#RUN chmod a+x /run.sh
#RUN chmod a+x /00-init
RUN chmod a+x /etc/cont-init.d/*

VOLUME [ "/sys/fs/cgroup" ]
#CMD [ "/run.sh" ]
#CMD [ "/00-init" ]
