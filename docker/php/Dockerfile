FROM php:8.1-fpm

WORKDIR /var/www

#install some packages
RUN apt-get clean && apt-get update
RUN apt-get install -y git
RUN apt-get install -y zip
RUN apt-get install -y libzip-dev


RUN docker-php-ext-install zip

# install composer
RUN curl -sS https://getcomposer.org/installer | php \
  && mv composer.phar /usr/local/bin/ \
  && ln -s /usr/local/bin/composer.phar /usr/local/bin/composer

RUN /usr/local/bin/composer selfupdate

ENV PATH="~/.composer/vendor/bin:./vendor/bin:${PATH}"
# add aliases for ease of use
RUN echo 'alias ll="ls -lah"' >> ~/.bashrc

WORKDIR /data/www

# clean up
RUN apt-get autoremove -y --purge && apt-get clean
