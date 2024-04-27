
#ARG BUILD_FROM
#FROM $BUILD_FROM
FROM debian:bookworm
# Set shell
#SHELL ["/bin/bash", "-o", "pipefail", "-c"]

RUN apt-get update
RUN apt-get install -y git iptables procps network-manager iproute2 iw wpasupplicant net-tools
RUN apt-get install -y sudo mc hostapd qrencode dnsmasq jq lighttpd vnstat isoquery locales
RUN apt-get install -y dhcpcd5 python3
RUN apt-get install -y php8.2-cgi
RUN lighttpd-enable-mod fastcgi-php
RUN service lighttpd restart

RUN rm -Rf /var/www/html
RUN git clone https://github.com/RaspAP/raspap-webgui /var/www/html 
COPY files /
COPY run.sh /home/run.sh
RUN chmod a+x /home/run.sh
#WORKDIR /app
#WORKDIR /home
CMD [ "/bin/bash", "-c", "/home/run.sh" ]