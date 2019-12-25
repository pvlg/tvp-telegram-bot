#!/usr/bin/env bash

chown -R www-data:www-data /data
chown -R www-data:www-data /var/www

echo "www-data:${WWW_DATA_PASSWORD}" | chpasswd

service mysql start
service nginx start
service ssh start
service php7.0-fpm start
service supervisor start

tail -f /var/log/*
