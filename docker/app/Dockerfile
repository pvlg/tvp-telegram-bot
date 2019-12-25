FROM ubuntu:16.04
MAINTAINER Pavel Gurin "gurinpavel.a@gmail.com"

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update
RUN apt-get install -y \
    mysql-server \
    mysql-client \
    php7.0 \
    php7.0 \
    php7.0-fpm \
    php7.0-mbstring \
    php7.0-intl \
    php7.0-mysql \
    php7.0-curl \
    wget \
    supervisor \
    unzip \
    curl \
    nano \
    mc \
    vim \
    nginx \
    phpmyadmin \
    openssh-server \
    cron

# Install gosu
RUN wget -O /usr/local/bin/gosu "https://github.com/tianon/gosu/releases/download/1.9/gosu-$(dpkg --print-architecture)"
RUN chmod +x /usr/local/bin/gosu

# Configure php
RUN sed -i 's/^;clear_env/clear_env/' /etc/php/7.0/fpm/pool.d/www.conf
RUN sed -ri "s/listen = .*$/listen = 0.0.0.0:9000/" /etc/php/7.0/fpm/pool.d/www.conf
RUN mkdir /run/php

# Install composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
RUN chown -R www-data:www-data /var/www
RUN gosu www-data composer global require "fxp/composer-asset-plugin:^1.2.0"

# Configure ssh
RUN chsh -s /bin/bash www-data && \
    sed -i 's/#PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config && \
    mkdir -p /var/www/.ssh && \
    chown -R www-data:www-data /var/www

# Configure supervisor
#RUN echo "files = /etc/supervisor/conf.d/*.conf" >> /etc/supervisor/supervisord.conf

ADD files /

WORKDIR /data

ADD files/run.sh /
RUN chmod +x /run.sh

EXPOSE 80

CMD ["/run.sh"]
