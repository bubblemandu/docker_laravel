# step 1
FROM php:8.0-fpm

COPY ./php.ini /usr/local/etc/php/
# step 2
WORKDIR /root
RUN apt-get update
RUN apt-get install -y curl
# step 3
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/bin/composer
# step 4
RUN docker-php-ext-install pdo_mysql
RUN apt-get install -y zlib1g-dev && apt-get install -y libzip-dev
RUN docker-php-ext-install zip
# step 5
RUN composer global require laravel/installer
RUN ["/bin/bash", "-c", "echo PATH=$PATH:~/.composer/vendor/bin/ >> ~/.bashrc"]
RUN ["/bin/bash", "-c", "source ~/.bashrc"]
# step 6
EXPOSE 9000
CMD ["php-fpm"]