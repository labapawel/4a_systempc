FROM php:8.2

RUN apt-get update -y
RUN docker-php-ext-install pdo pdo_mysql


WORKDIR /var/www
COPY . .

COPY --from=composer:2.5.8 /usr/bin/composer /usr/bin/composer

ENV PORT=8080
ENTRYPOINT [ "docker/entrypoint.sh" ]