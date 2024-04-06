<?php

define('RASPI_BRAND_TEXT', 'RaspAP_HA');
define('HA_CONFIG', '/config/hotspot_wifi');
define('RASPI_CONFIG', HA_CONFIG.'/raspap');
define('RASPI_CONFIG_NETWORK', RASPI_CONFIG.'/networking/defaults.json');
define('RASPI_CONFIG_PROVIDERS', 'config/vpn-providers.json');
define('RASPI_CONFIG_API', RASPI_CONFIG.'/api');
define('RASPI_ADMIN_DETAILS', RASPI_CONFIG.'/raspap.auth');
define('RASPI_WIFI_AP_INTERFACE', 'wlan0');
define('RASPI_CACHE_PATH', sys_get_temp_dir() . '/raspap');
define('RASPI_ERROR_LOG', sys_get_temp_dir() . '/raspap_error.log');
define('RASPI_DEBUG_LOG', 'raspap_debug.log');
define('RASPI_LOG_SIZE_LIMIT', 64);

// Constants for configuration file paths.
// These are typical for default RPi installs. Modify if needed.
define('RASPI_DNSMASQ_LEASES', '/var/lib/misc/dnsmasq.leases');
define('RASPI_DNSMASQ_PREFIX', HA_CONFIG.'/dnsmasq/090_');
define('RASPI_ADBLOCK_LISTPATH', '/etc/raspap/adblock/');
define('RASPI_ADBLOCK_CONFIG', RASPI_DNSMASQ_PREFIX.'adblock.conf');
define('RASPI_HOSTAPD_CONFIG', HA_CONFIG.'/hostapd/hostapd.conf');
define('RASPI_DHCPCD_CONFIG', HA_CONFIG.'/dhcpcd/dhcpcd.conf');
define('RASPI_DHCPCD_LOG', '/var/log/dnsmasq.log');
define('RASPI_HOSTAPD_LOG', '/tmp/hostapd.log');
define('RASPI_WPA_SUPPLICANT_CONFIG', HA_CONFIG.'/wpa_supplicant/wpa_supplicant.conf');
define('RASPI_HOSTAPD_CTRL_INTERFACE', '/var/run/hostapd');
define('RASPI_WPA_CTRL_INTERFACE', '/var/run/wpa_supplicant');
define('RASPI_OPENVPN_CLIENT_PATH', '/etc/openvpn/client/');
define('RASPI_OPENVPN_CLIENT_CONFIG', '/etc/openvpn/client/client.conf');
define('RASPI_OPENVPN_CLIENT_LOGIN', '/etc/openvpn/client/login.conf');
define('RASPI_WIREGUARD_PATH', '/etc/wireguard/');
define('RASPI_WIREGUARD_CONFIG', RASPI_WIREGUARD_PATH.'wg0.conf');
define('RASPI_TORPROXY_CONFIG', '/etc/tor/torrc');
define('RASPI_LIGHTTPD_CONFIG', '/etc/lighttpd/lighttpd.conf');
define('RASPI_ACCESS_CHECK_IP', '1.1.1.1');
define('RASPI_ACCESS_CHECK_DNS', 'one.one.one.one');

// Constant for the 5GHz wireless regulatory domain
define("RASPI_5GHZ_CHANNEL_MIN", 100);
define("RASPI_5GHZ_CHANNEL_MAX", 192);

// Enable basic authentication for the web admin.
define('RASPI_AUTH_ENABLED', false);

// Optional services, set to true to enable.
define('RASPI_WIFICLIENT_ENABLED', false);
define('RASPI_HOTSPOT_ENABLED', true);
define('RASPI_NETWORK_ENABLED', true);
define('RASPI_DHCP_ENABLED', true);
define('RASPI_ADBLOCK_ENABLED', false);
define('RASPI_OPENVPN_ENABLED', false);
define('RASPI_VPN_PROVIDER_ENABLED', false);
define('RASPI_WIREGUARD_ENABLED', false);
define('RASPI_TORPROXY_ENABLED', false);
define('RASPI_CONFAUTH_ENABLED', false);
define('RASPI_CHANGETHEME_ENABLED', false);
define('RASPI_VNSTAT_ENABLED', false);
define('RASPI_SYSTEM_ENABLED', true);
define('RASPI_MONITOR_ENABLED', false);
define('RASPI_RESTAPI_ENABLED', false);

// Locale settings
define('LOCALE_ROOT', 'locale');
define('LOCALE_DOMAIN', 'messages');