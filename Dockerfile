FROM 708u/laravel-alpine:7.4.4

WORKDIR /app
#
COPY . /app

RUN set -x \
    && cp .env.example .env \
    && php artisan config:clear \
    && php artisan key:generate \
    && chmod -R ug+rwx storage bootstrap/cache \
    && chgrp -R www-data storage bootstrap/cache
