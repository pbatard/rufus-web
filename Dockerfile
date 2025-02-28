FROM php:8.3-apache-bookworm

ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get -y update && apt-get -y upgrade
RUN apt-get -y install locales-all libicu-dev

# The Javanese Locale does not exist by default. Duplicate it from Indonesian.
RUN cp -r /lib/locale/id_ID /lib/locale/jv_ID
RUN cp -r /lib/locale/id_ID.utf8 /lib/locale/jv_ID.utf8

RUN docker-php-ext-install gettext && \
    docker-php-ext-configure intl && \
    docker-php-ext-install intl

WORKDIR /var/www/html
COPY . /var/www/html/

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN a2enmod rewrite

EXPOSE 80
