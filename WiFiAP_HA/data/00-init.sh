#!/usr/bin/with-contenv bashio
# ==============================================================================
# Home Assistant Community Add-on: Pi-hole
# Runs the hostapd daemon
# ==============================================================================

# Run dnsmasq
#bashio::log.info "Init..."
declare DIR
declare DIR_RASPAP
DIR="/config/wifiap_ha"
DIR_RASPAP="${DIR}/raspap"
#LANG="$(bashio::config 'language')"