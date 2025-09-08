ARG BUILD_FROM
FROM ghcr.io/raspap/raspap-docker:latest

# Copy data for add-on
COPY run.sh /
RUN chmod a+x /run.sh

CMD ["/run.sh"]
