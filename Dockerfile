FROM php:7.4.3-alpine

WORKDIR /app
RUN apk --no-cache add pcre-dev ${PHPIZE_DEPS} \ 
  && pecl install xdebug \
  && docker-php-ext-enable xdebug \
  && apk del pcre-dev ${PHPIZE_DEPS} \
  && echo "xdebug.mode=coverage" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
COPY composer.json .
COPY composer.phar .
RUN ./composer.phar install  --prefer-dist --no-scripts --no-autoloader
COPY . . 
RUN ./composer.phar dump-autoload --no-scripts --optimize
VOLUME ["/vendor"]

