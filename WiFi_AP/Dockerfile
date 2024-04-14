
ARG BUILD_FROM
FROM $BUILD_FROM

# Set shell
SHELL ["/bin/bash", "-o", "pipefail", "-c"]

#RUN apt-get update
#RUN apt-get install -y git iptables procps iproute2 iw wpasupplicant net-tools
#RUN apt-get install -y sudo mc hostapd qrencode dnsmasq jq lighttpd vnstat isoquery locales
#RUN apt-get install -y dhcpcd5
#RUN apt-get install -y php8.2-cgi

RUN apk update
RUN apk add -y git iptables procps iproute2 iw wpasupplicant net-tools
RUN apk add -y sudo mc hostapd qrencode dnsmasq jq lighttpd vnstat isoquery locales
RUN apk add -y dhcpcd5
RUN apk add -y php8.2-cgi

RUN rm -Rf /var/www/html
RUN git clone https://github.com/RaspAP/raspap-webgui /var/www/html 
 
COPY /rootfs /
RUN chmod a+x /etc/cont-init.d/*

VOLUME [ "/sys/fs/cgroup" ]