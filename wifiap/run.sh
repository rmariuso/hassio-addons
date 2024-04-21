#!/bin/bash

# Start a long-running process to keep the container pipes open
#sleep infinity < /proc/1/fd/0 > /proc/1/fd/1 2>&1 &
# Wait a bit before retrieving the PID
#sleep 1
# Save the long-running PID on file
#echo $! > /container-pipes-pid
# Start systemd as PID 1
#echo "Hello world!"
#exec /usr/lib/systemd/systemd

echo "Hello world!"
python3 -m http.server 8080

#/etc/init.d/dhcpcd start && /etc/init.d/dnsmasq start && /etc/init.d/hostapd start && /etc/init.d/lighttpd start