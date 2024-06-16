FROM php:8.2-fpm 
COPY php.ini /usr/local/etc/php/
RUN apt-get update && apt-get install -y \
zlib1g-dev \
libzip-dev \
vim \
&& docker-php-ext-install zip pdo_mysql opcache
RUN curl -fsSL https://deb.nodesource.com/setup_22.x -o nodesource_setup.sh
RUN bash nodesource_setup.sh
RUN apt-get install -y nodejs
WORKDIR /var/www/laravel-project
COPY --from=composer /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1 
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin
RUN composer global require "laravel/installer"
