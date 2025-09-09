#!/bin/sh

service lighttpd start
/etc/raspap/hostapd/servicestart.sh --seconds 1

# Run RaspAP
tail -f /dev/null
