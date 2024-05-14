
ARG BUILD_FROM
FROM $BUILD_FROM

RUN apt-get update
RUN apt-get install -y apt-utils
RUN apt-get install -y git iptables procps iproute2 iw wpasupplicant net-tools
RUN apt-get install -y sudo mc hostapd qrencode dnsmasq jq lighttpd vnstat isoquery locales
RUN apt-get install -y dhcpcd5
RUN apt-get install -y php8.2-cgi
#VOLUME [ "/sys/fs/cgroup" ]
RUN rm -Rf /var/www/html
RUN git clone https://github.com/RaspAP/raspap-webgui /var/www/html 
RUN sed -i "s/RaspAP/WifiAP/1" /var/www/html/config/config.php
RUN grep -riIl "hostname -f" "/var/www/html/" | xargs sed -i "s|hostname -f|hostname|g"
RUN grep -riIl "/etc/raspap" "/var/www/html" | xargs sed -i "s|/etc/raspap|/config/wifiap|g"
RUN grep -riIl "/etc/hostapd" "/var/www/html" | xargs sed -i "s|/etc/hostapd|/config/wifiap/hostapd|g"
RUN grep -riIl "/etc/dnsmasq.d" "/var/www/html" | xargs sed -i "s|/etc/dnsmasq.d|/config/wifiap/dnsmasq|g"
RUN grep -riIl "/etc/dhcpcd.conf" "/var/www/html" | xargs sed -i "s|/etc/dhcpcd.conf|/config/wifiap/dhcpcd/dhcpcd.conf|g"
RUN grep -riIl "systemctl" "/var/www/html" | xargs sed -i "s|systemctl \(.*\) \(.*\).service|service \2 \1|g"
RUN grep -riIl "systemctl" "/var/www/html" | xargs sed -i "s|systemctl \(.*\) systemd-networkd|service systemd-networkd \1|g"
RUN grep -riIl "service" "/var/www/html" | xargs sed -i "s|/bin/service|/sbin/service|g"
RUN cp /var/www/html/installers/raspap.sudoers /etc/sudoers.d/090_raspap
RUN cp /var/www/html/config/config.php /var/www/html/includes/
COPY rootfs /
RUN chmod a+x /etc/cont-init.d/init
RUN chmod a+x /etc/init.d/dhcpcd
RUN chmod a+x /etc/init.d/hostapd
RUN chmod a+x /etc/init.d/lighttpd
RUN chmod a+x /etc/init.d/vnstat
