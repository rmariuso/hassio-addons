# Some parts of code originated from https://github.com/j8r/dockerfiles/

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
COPY password-generator.php /home/password-generator.php
# Copy data for add-on
COPY run.sh /run.sh
RUN chmod +x /run.sh

#CMD [ "/run.sh" ]
CMD [ "/bin/bash", "-c", "/home/env-setup.sh && /home/firewall-rules.sh && /lib/systemd/systemd && /run.sh" ]