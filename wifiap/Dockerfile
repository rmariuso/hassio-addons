#ARG BUILD_FROM
#FROM $BUILD_FROM

FROM debian:bookworm

ENV container docker
ENV LC_ALL C
ENV DEBIAN_FRONTEND noninteractive

SHELL ["/bin/bash", "-o", "pipefail", "-c"]

ENV LANG C.UTF-8

RUN apt update && \
#apt install -y bash systemd systemd-sysv iw hostapd network-manager net-tools sudo iproute2 dnsmasq iptables lighttpd procps
apt install -y bash systemd systemd-sysv iw hostapd network-manager net-tools sudo python3 procps
#COPY hostapd.conf /
#COPY dnsmasq.conf /
VOLUME [ "/sys/fs/cgroup" ]

COPY run.sh /
RUN chmod a+x /run.sh
CMD [ "/run.sh" ]
#COPY /rootfs /
#RUN chmod a+x /etc/cont-init.d/*

#EXPOSE 80
#CMD [ "/sbin/init" ]
