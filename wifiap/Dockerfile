# Some parts of code originated from https://github.com/j8r/dockerfiles/
ARG BUILD_FROM
FROM $BUILD_FROM
#FROM debian:bookworm

ENV container docker
ENV LC_ALL C
ENV DEBIAN_FRONTEND noninteractive
# Set shell
#SHELL ["/bin/bash", "-o", "pipefail", "-c"]

RUN apt-get update \
    && apt-get install -y systemd systemd-sysv sudo wget procps curl net-tools iproute2 \
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

RUN curl -sL https://install.raspap.com | bash -s -- --yes --wireguard 0 --openvpn 0 --adblock 0 --rest 0
COPY config.php /var/www/html/includes/
COPY firewall-rules.sh /home/firewall-rules.sh
COPY wpa_supplicant.conf /etc/wpa_supplicant/
RUN chmod +x /home/firewall-rules.sh
COPY env-setup.sh /home/env-setup.sh
RUN chmod +x /home/env-setup.sh
COPY lighttpd.conf /etc/lighttpd/
COPY password-generator.php /home/password-generator.php
COPY run.sh /
RUN chmod a+x /run.sh
#CMD [ "/run.sh" ]
CMD [ "/bin/bash", "-c", "/home/env-setup.sh && /home/firewall-rules.sh && /run.sh" ]
