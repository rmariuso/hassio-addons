#!/bin/bash

echo "Hello world!"
#python3 -m http.server 8000
lighttpd -f /etc/lighttpd/lighttpd.conf
dhcpcd -f "/config/wifiap/dhcpcd/dhcpcd.conf"
dnsmasq -C "/config/wifiap/dnsmasq/090_raspap.conf"
hostapd -d -B -i wlan0 /config/wifiap/hostapd/hostapd.conf -f /tmp/hostapd.log 1> /dev/null