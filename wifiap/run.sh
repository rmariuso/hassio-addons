#!/bin/sh

/etc/raspap/hostapd/servicestart.sh --seconds 1

# Run RaspAP
tail -f /dev/null
