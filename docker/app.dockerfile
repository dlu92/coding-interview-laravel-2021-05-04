FROM php:8.0.3-apache-buster
LABEL maintainer="David Luis david.lu1992@gmail.com"

EXPOSE 80/tcp
EXPOSE 80/udp
EXPOSE 9000/tcp
EXPOSE 9000/udp

ENV APP_RUN_CRON_JOBS true
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# By default enable cron jobs
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Use the default production configuration
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

#Library for managing images
RUN apt-get update && apt-get install -y \
    autoconf \
    acl \
    sudo \
    zip \
    curl \
    cron \
    openssl \
    unzip \
    git \
    wget \
    nano \
    vim \
    gnupg \
    iputils-ping \
    nmap \
    dos2unix \
    apt-utils \
    pkg-config \
    zlib1g-dev \
    libzip-dev \
    mariadb-client \
    build-essential \
    libcurl4 \
    libcurl4-openssl-dev \
    libmcrypt-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libxml2-dev \
    libcurl3-dev \
    libssl-dev \
    libmemcached-dev \
    libc-client-dev \
    libicu-dev \
    libkrb5-dev \
    libz-dev \
    libonig-dev \
    libmagick++-dev \
    libmagickwand-dev \
    libpq-dev \
    libwebp-dev \ 
    libxpm-dev \
    && apt-get purge -y --auto-remove -o APT::AutoRemove::RecommendsImportant=false \
    && rm -rf /var/lib/apt/lists/* \
    && rm /etc/cron.daily/* \
    && pecl install memcached xmlrpc redis \
    && docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-configure curl --with-curl \
    && docker-php-ext-configure zip \
    && docker-php-ext-configure opcache --enable-opcache \
    && docker-php-ext-install pdo_mysql mysqli soap xml mbstring bcmath gd zip intl \
    && docker-php-ext-install -j$(nproc) gd curl \
    && docker-php-ext-enable pdo_mysql mysqli soap xml mbstring bcmath gd zip memcached intl \
    && apt-get clean

# Enable a2mods
RUN a2enmod rewrite

# install composer
RUN curl -o /usr/local/bin/composer https://getcomposer.org/composer.phar && \
	chmod +x /usr/local/bin/composer

#Xdebug
RUN pecl install xdebug-3.0.1 \
    && docker-php-ext-enable xdebug
#RUN echo "zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20131226/xdebug.so" > /usr/local/etc/php/conf.d/xdebug.ini && \
RUN echo "xdebug.default_enable = 1" >> /usr/local/etc/php/conf.d/xdebug.ini && \
    echo "xdebug.remote_enable = 1" >> /usr/local/etc/php/conf.d/xdebug.ini && \
    echo "xdebug.remote_handler = dbgp" >> /usr/local/etc/php/conf.d/xdebug.ini && \
    echo "xdebug.remote_autostart = 1" >> /usr/local/etc/php/conf.d/xdebug.ini && \
    #COULD CHECK HOW TO MAKE THIS WORK SO NO NEED TO SPECIFY LOCAL IP ADDRESS IN DOCKER_COMPOSE
    #echo "xdebug.remote_connect_back=1" >> /usr/local/etc/php/conf.d/xdebug.ini \
    echo "xdebug.remote_port = 9000" >> /usr/local/etc/php/conf.d/xdebug.ini && \
    echo "xdebug.profiler_enable=0" >> /usr/local/etc/php/conf.d/xdebug.ini && \
    echo "xdebug.profiler_enable_trigger=1" >> /usr/local/etc/php/conf.d/xdebug.ini && \
    echo "xdebug.profiler_output_dir=\"/tmp\"" >> /usr/local/etc/php/conf.d/xdebug.ini

# Copy init scripts
COPY ./docker/entrypoint.sh /usr/local/bin/
RUN dos2unix /usr/local/bin/entrypoint.sh
RUN ln -s /usr/local/bin/entrypoint.sh /
RUN ["chmod", "+x", "/entrypoint.sh"]

ENTRYPOINT ["/bin/bash","/entrypoint.sh"]

CMD ["apache2-foreground"]