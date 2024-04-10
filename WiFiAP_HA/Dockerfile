
ARG BUILD_FROM
FROM $BUILD_FROM

# Set shell
SHELL ["/bin/bash", "-o", "pipefail", "-c"]

RUN apt-get update
#RUN apt-get install -y software-properties-common
#RUN add-apt-repository ppa:ondrej/php
RUN apt-get install -y git iptables procps iproute2 iw wpasupplicant net-tools
RUN apt-get install -y sudo mc hostapd qrencode dnsmasq jq lighttpd isoquery vnstat locales
RUN apt-get install -y dhcpcd5
RUN apt-get install -y php8.2-cgi

RUN rm -Rf /var/www/html
#RUN git clone --branch 2.9.4 https://github.com/RaspAP/raspap-webgui /var/www/html 
 
COPY /rootfs /
#WORKDIR /data
#COPY run.sh /
#COPY 00-init /
#RUN chmod a+x /run.sh
#RUN chmod a+x /00-init
RUN chmod a+x /etc/cont-init.d/*

#RUN cp /var/www/html/config/50-raspap-router.conf /etc/lighttpd/conf-available
#RUN ln -s /etc/lighttpd/conf-available/50-raspap-router.conf /etc/lighttpd/conf-enabled/50-raspap-router.conf
VOLUME [ "/sys/fs/cgroup" ]
#CMD [ "/run.sh" ]
#CMD [ "/00-init" ]

# Build arguments
#ARG BUILD_ARCH
#ARG BUILD_DATE
#ARG BUILD_REF
#ARG BUILD_VERSION

# Labels
#LABEL \
#    io.hass.name="hotspot_wifi" \
#    io.hass.description="hotspot_wifi" \
#    io.hass.arch="${BUILD_ARCH}" \
#    io.hass.type="addon" \
#    io.hass.version=${BUILD_VERSION} \
#    maintainer="rmariuso <rmariuso@gmail.com>" \
#    org.label-schema.description="hotspot_wifi" \
#    org.label-schema.build-date=${BUILD_DATE} \
#    org.label-schema.name="hotspot_wifi" \
#    org.label-schema.schema-version="1.0" \
#    org.label-schema.url="https://github.com/rmariuso/hassio-addons/" \
#    org.label-schema.usage="https://github.com/rmariuso/hassio-addons/tree/master/wifiAP_HA/tree/master/README.md" \
#    org.label-schema.vcs-ref=${BUILD_REF} \
#    org.label-schema.vcs-url="https://github.com/ArminasTV/Hassio-addons/tree/master/hotspot_wifi" \
#    org.label-schema.vendor="ArminasTV"
