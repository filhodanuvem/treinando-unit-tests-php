FROM php:7.4.3-alpine

WORKDIR /app
# RUN apt-get update && apt-get install -y git libzip-dev zip && apt-get clean
COPY composer.json .
COPY composer.phar .
RUN ./composer.phar install  --prefer-dist --no-scripts --no-autoloader
COPY . . 
RUN ./composer.phar dump-autoload --no-scripts --optimize

VOLUME ["/vendor"]

