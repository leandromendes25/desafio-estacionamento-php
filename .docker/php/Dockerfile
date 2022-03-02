FROM php:7.4-fpm
ARG user=app
ARG WITH_XDEBUG=false
#podemos passar with_xdebug no composer
RUN apt-get update && apt install -y unzip
RUN apt-get install -y libzip-dev && docker-php-ext-install zip mysqli pdo_mysql
# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
RUN useradd -ms /bin/bash $user
RUN chown -R $user:$user /var/www/html
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN if[$WITH_XDEBUG = "true"]; then \
RUN pecl install xdebug && docker-php-ext-enable xdebug
RUN echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
&& echo "xdebug.remote_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
&& echo "xdebug.remote_autostart=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    fi ;
USER $user
EXPOSE 9000
CMD ["php-fpm"]