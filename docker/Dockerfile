FROM php:8.3-apache

RUN apt-get update 	&& apt-get install -y \
	libpq-dev \
	unzip \
    curl \
    git \
	&& docker-php-ext-install pdo pdo_pgsql \
    && rm -rf /var/lib/apt/lists/*

COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN a2enmod rewrite

RUN service apache2 restart


