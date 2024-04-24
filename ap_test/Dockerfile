# Some parts of code originated from https://github.com/j8r/dockerfiles/
FROM docker:dind

ENV container docker
#SHELL ["/bin/bash", "-o", "pipefail", "-c"]

COPY run.sh /
RUN chmod a+x /run.sh
CMD [ "/run.sh" ]
