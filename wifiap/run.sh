#!/usr/bin/with-contenv bashio

echo "Hello world!"

bashio::log.info "Init..."
declare DIR
declare DIR_RASPAP
DIR="/config/wifiap"
DIR_RASPAP="${DIR}/raspap"
#LANG="$(bashio::config 'language')"

# Ensure configuration exists
if ! bashio::fs.directory_exists "${DIR}"; then

	bashio::log.info "Create folders.."
    mkdir -p "${DIR_RASPAP}" || bashio::exit.nok "Failed to create hotspot_wifi configuration directory"
    mkdir -p "${DIR_RASPAP}/networking"
    mkdir -p "${DIR}/vnstat"
    mkdir -p "${DIR}/dhcpcd"
    mkdir -p "${DIR}/hostapd"
    mkdir -p "${DIR}/dnsmasq"
    chown -R www-data:www-data /var/www/html
    chown -R www-data:www-data "${DIR_RASPAP}"
    chown -R www-data:www-data "${DIR}" 
    chown -R www-data:www-data "${DIR}/hostapd"
    chown -R www-data:www-data "${DIR}/dnsmasq"
    chown -R www-data:www-data /tmp
    chown -R www-data:www-data /var/tmp 


    #### dnsmasq
	bashio::log.info "MV de ${DIR}/dnsmasq/dnsmasq.conf"
	mv /var/www/html/config/090_raspap.conf "${DIR}/dnsmasq"
	mv /var/www/html/config/090_wlan0.conf "${DIR}/dnsmasq"
	grep -riIl "/etc/dnsmasq.d" "${DIR}/dnsmasq" | xargs sed -i "s|/etc/dnsmasq.d|${DIR}/dnsmasq|g"
	
	#### dhcpcd
	bashio::log.info "MV de ${DIR}/dhcpcd/dhcpcd.conf"
    mv /var/www/html/config/dhcpcd.conf "${DIR}/dhcpcd/dhcpcd.conf"

	#### hostapd
	bashio::log.info "MV de ${DIR}/hostapd/hostapd.conf"
    mv /var/www/html/config/hostapd.conf "${DIR}/hostapd/hostapd.conf"
	
	mv /var/www/html/config/defaults.json "${DIR_RASPAP}/networking/"
    mv /etc/vnstat.conf "${DIR_RASPAP}/vnstat.conf"

fi


/etc/init.d/dhcpcd start && /etc/init.d/dnsmasq start && sleep 4 && /etc/init.d/lighttpd start && hostapd /etc/hostapd/hostapd.conf 1> /dev/null