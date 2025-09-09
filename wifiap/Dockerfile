ARG BUILD_FROM
FROM ghcr.io/raspap/raspap-docker:latest

RUN grep -riIl "systemctl" "/var/www/html" | xargs sed -i "s|systemctl \(.*\) \(.*\).service|service \2 \1|g"
RUN grep -riIl "systemctl" "/var/www/html" | xargs sed -i "s|systemctl \(.*\) systemd-networkd|service systemd-networkd \1|g"
RUN grep -riIl "systemctl" "/etc/raspap" | xargs sed -i "s|systemctl \(.*\) \(.*\).service|service \2 \1|g"
RUN grep -riIl "systemctl" "/etc/raspap" | xargs sed -i "s|systemctl \(.*\) systemd-networkd|service systemd-networkd \1|g"
RUN grep -riIl "service" "/var/www/html" | xargs sed -i "s|/bin/service|/usr/sbin/service|g"
RUN grep -riIl "service" "/etc/raspap" | xargs sed -i "s|/bin/service|/usr/sbin/service|g"
RUN cp /var/www/html/installers/raspap.sudoers /etc/sudoers.d/090_raspap

# Copy data for add-on
COPY run.sh /
RUN chmod a+x /run.sh

CMD ["/run.sh"]

