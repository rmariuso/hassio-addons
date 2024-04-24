# Some parts of code originated from https://github.com/j8r/dockerfiles/
#FROM docker:dind
FROM jrei:systemd-debian

ENV container docker
#SHELL ["/bin/bash", "-o", "pipefail", "-c"]
#RUN \
#  apk add --no-cache \
#    python3

RUN apt-get update \
    && apt-get install -y systemd python3 systemd-sysv sudo wget procps curl net-tools iproute2 \
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

COPY run.sh /
RUN chmod a+x /run.sh
CMD [ "/run.sh" ]
