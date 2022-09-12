FROM php:8.1.6-apache
ARG DEBIAN_FRONTEND=noninteractive

RUN docker-php-ext-install mysqli
RUN apt-get update \
    && apt-get install -y sendmail libpng-dev \
    && apt-get install -y libzip-dev \
    && apt-get install -y zlib1g-dev \
    && apt-get install -y libonig-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install zip

RUN docker-php-ext-install mbstring
RUN docker-php-ext-install zip
RUN docker-php-ext-install gd
RUN docker-php-source extract
RUN a2enmod rewrite
RUN service apache2 restart 

COPY ./src/ /var/www/html
COPY ./composer.* /var/www/

RUN usermod -u 1000 www-data
RUN chown -R www-data:www-data /var/www/

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --filename=composer --install-dir=/usr/local/bin
RUN php -r "unlink('composer-setup.php');"
RUN cd /var/www/ \
    && composer install \
    && composer dump-autoload