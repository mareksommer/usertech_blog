FROM php:7.1.2-apache 

# Configure Apache and installs other services (composer)
RUN a2enmod rewrite \
    && apt-get update \
    && echo 'ServerName localhost' >> /etc/apache2/apache2.conf \
    && apt-get install -y curl git \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install extra php libraries
RUN docker-php-ext-install pdo pdo_mysql mbstring

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf