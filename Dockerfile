FROM 708u/laravel-alpine:7.4.7

WORKDIR /app

COPY . /app

RUN set -x \
    && php artisan config:clear \
    && chmod -R ug+rwx storage bootstrap/cache \
    && chgrp -R www-data storage bootstrap/cache
