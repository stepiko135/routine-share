FROM php:7.3-fpm-alpine
LABEL maintainer "hiro"

COPY ./src /work
COPY ./docker/php/php.ini /usr/local/etc/php/php.ini

# timezone
ARG TZ=Asia/Tokyo

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer

RUN set -eux && \
  # Intervention Image時に必要なパッケージ
  apk add --no-cache libpng libpng-dev libjpeg-turbo-dev freetype-dev&& \
  docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ && \
  docker-php-ext-install -j$(nproc) gd && \
  #------------------------------
  apk add npm && \
  npm install -g npm && \
  apk add --update-cache --no-cache --virtual=.build-dependencies tzdata && \
  cp /usr/share/zoneinfo/${TZ} /etc/localtime && \
  apk del .build-dependencies && \
  docker-php-ext-install bcmath pdo_mysql && \
  curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer && \
  composer config -g repos.packagist composer https://packagist.jp && \
  composer global require hirak/prestissimo \