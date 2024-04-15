ARG BUILD_FROM
FROM $BUILD_FROM

#MAINTAINER Matt Longman <git@mattlongman.com>

SHELL ["/bin/bash", "-o", "pipefail", "-c"]

ENV LANG C.UTF-8

RUN apt update && \
apt install -y bash iw hostapd network-manager net-tools sudo iproute2 dnsmasq iptables


COPY hostapd.conf /
COPY dnsmasq.conf /

COPY run.sh /
RUN chmod a+x /run.sh

CMD [ "/run.sh" ]
