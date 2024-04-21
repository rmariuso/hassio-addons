# Some parts of code originated from https://github.com/j8r/dockerfiles/
#ARG BUILD_FROM
#FROM $BUILD_FROM
FROM debian:bookworm

ENV container docker
ENV LC_ALL C
ENV DEBIAN_FRONTEND noninteractive
# Set shell
#SHELL ["/bin/bash", "-o", "pipefail", "-c"]

RUN apt-get update \
    && apt-get install -y systemd systemd-sysv sudo python3 wget procps curl systemd iproute2 \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN cd /lib/systemd/system/sysinit.target.wants/ \
    && rm $(ls | grep -v systemd-tmpfiles-setup)

RUN rm -f /lib/systemd/system/multi-user.target.wants/* \
    /etc/systemd/system/*.wants/* \
    /lib/systemd/system/local-fs.target.wants/* \
    /lib/systemd/system/sockets.target.wants/*udev* \
    /lib/systemd/system/sockets.target.wants/*initctl* \
    /lib/systemd/system/basic.target.wants/* \
    /lib/systemd/system/anaconda.target.wants/* \
    /lib/systemd/system/plymouth* \
    /lib/systemd/system/systemd-update-utmp*

VOLUME [ "/sys/fs/cgroup" ]

EXPOSE 8081

RUN curl -sL https://install.raspap.com | bash -s -- --yes --wireguard 0 --openvpn 0 --adblock 0 --rest 0
COPY firewall-rules.sh /home/firewall-rules.sh
COPY wpa_supplicant.conf /etc/wpa_supplicant/
RUN chmod +x /home/firewall-rules.sh
COPY env-setup.sh /home/env-setup.sh
RUN chmod +x /home/env-setup.sh
COPY dhcpcd-start.sh /home/dhcpcd-start.sh
RUN chmod +x /home/dhcpcd-start.sh
COPY dnsmasq-start.sh /home/dnsmasq-start.sh
RUN chmod +x /home/dnsmasq-start.sh
COPY hostapd-start.sh /home/hostapd-start.sh
RUN chmod +x /home/hostapd-start.sh
COPY lighttpd-start.sh /home/lighttpd-start.sh
RUN chmod +x /home/lighttpd-start.sh

COPY password-generator.php /home/password-generator.php
# Copy data for add-on
COPY run.sh /
RUN chmod a+x /run.sh
#CMD [ "/run.sh" ]
ENTRYPOINT ["/run.sh"]
CMD [ "/bin/bash", "-c", "/home/env-setup.sh && /home/firewall-rules.sh" ]
#CMD [ "/bin/bash", "-c", "/home/env-setup.sh && /home/firewall-rules.sh && /home/dhcpcd-start.sh && /home/dnsmasq-start.sh && /home/hostapd-start.sh && /home/lighttpd-start.sh && /run.sh" ]
