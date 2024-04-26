#!/bin/bash

sudo chown -R www-data:www-data /var/www/html
sudo chown -R www-data:www-data /config/wifiap
sudo mv /var/www/html/installers/enablelog.sh /config/wifiap/hostapd
sudo mv /var/www/html/installers/disablelog.sh /config/wifiap/hostapd
sudo mv /var/www/html/installers/servicestart.sh /config/wifiap/hostapd
sudo mv /var/www/html/installers/debuglog.sh /config/wifiap/system
sudo chown -c root:root /config/wifiap/hostapd/*.sh
sudo chmod 750 /config/wifiap/hostapd/*.sh
sudo chown -c root:root /config/wifiap/system/*.sh
sudo chmod 750 /config/wifiap/system/*.sh
sudo cp /var/www/html/installers/configport.sh /config/wifiap/lighttpd
sudo chown -c root:root /config/wifiap/lighttpd/*.sh
sudo mv /etc/default/hostapd ~/default_hostapd.old
sudo cp /etc/hostapd/hostapd.conf ~/hostapd.conf.old
sudo cp /var/www/html/config/hostapd.conf /config/wifiap/hostapd/hostapd.conf
sudo cp /var/www/html/config/dhcpcd.conf /config/wifiap/dhcpcd/dhcpcd.conf
sudo cp /var/www/html/config/defaults.json /config/wifiap/networking/
sudo cp /var/www/html/config/raspap-bridge-br0.netdev /etc/systemd/network/raspap-bridge-br0.netdev
sudo cp /var/www/html/config/raspap-br0-member-eth0.network /etc/systemd/network/raspap-br0-member-eth0.network


echo "Hello world!"
#python3 -m http.server 8000
lighttpd -f /etc/lighttpd/lighttpd.conf
dhcpcd -f "/config/wifiap/dhcpcd/dhcpcd.conf"
dnsmasq -C "/config/wifiap/dnsmasq/090_raspap.conf"
hostapd -d -B -i wlan0 /config/wifiap/hostapd/hostapd.conf -f /tmp/hostapd.log 1> /dev/null