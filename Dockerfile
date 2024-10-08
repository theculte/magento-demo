# /path/to/project/Dockerfile

# Our image is based on Ubuntu.
FROM ubuntu

# Here we define a few arguments to the Dockerfile. Specifically, the
# user, user id and group id for a new account that we will use to work
# as within our container.
ARG USER=docker
ARG UID=1000
ARG GID=1000

# Install PHP, composer and all extensions needed for Magento.
RUN apt-get update && apt-get install -y software-properties-common curl

#RUN add-apt-repository ppa:ondrej/php
RUN apt-get update && apt-get install -y php
RUN apt-get update && apt-get install -y \
    php-mysql php-xml php-intl php-curl \
    php-bcmath php-gd php-mbstring php-soap php-zip \
    composer vim

# Install Xdebug for a better developer experience.
RUN apt-get update && apt-get install -y php-xdebug
#RUN echo "xdebug.remote_enable=on" >> /etc/php/7.4/mods-available/xdebug.ini
#RUN echo "xdebug.remote_autostart=on" >> /etc/php/7.4/mods-available/xdebug.ini

# Install the mysql CLI client.
RUN apt-get update && apt-get install -y mysql-client

# Set up a non-root user with sudo access.
#RUN groupadd --gid $GID $USER \
#RUN useradd -s /bin/bash --uid $UID --gid $GID -m $USER \
RUN apt-get install -y sudo \
    && echo "$USER ALL=(root) NOPASSWD:ALL" > /etc/sudoers.d/$USER \
    && chmod 0440 /etc/sudoers.d/$USER

# Use the non-root user to log in as into the container.
USER ${UID}:${GID}

# Set this as the default directory when we connect to the container.
WORKDIR /workspaces/magento-demo

# This is a quick hack to make sure the container has something to run
# when it starts, preventing it from closing itself automatically when
# created. You could also remove this and run the container with `docker
# run -t -d` to get the same effect. More on `docker run` further below.
CMD ["sleep", "infinity"]
