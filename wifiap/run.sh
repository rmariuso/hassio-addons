#!/bin/bash

#echo "Hello world!"
#python3 -m http.server 8080

/etc/init.d/dhcpcd restart
/etc/init.d/dnsmasq restart
/etc/init.d/hostapd restart
/etc/init.d/lighttpd restart