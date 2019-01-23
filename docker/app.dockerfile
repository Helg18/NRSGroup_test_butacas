FROM php:7.1-fpm-alpine

RUN apk update && apk add libxml2-dev libmcrypt vim unzip git wget vim nano curl \
  && docker-php-ext-install json mbstring xml soap zip

RUN apk add --no-cache libpng libpng-dev && docker-php-ext-install gd && apk del libpng-dev
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN set -ex \
 && apk --no-cache add \
  postgresql-dev
RUN docker-php-ext-install pgsql pdo pdo_pgsql
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
