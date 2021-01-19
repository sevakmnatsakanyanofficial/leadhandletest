FROM php:7.4-cli

COPY . /usr/src/myapp
WORKDIR /usr/src/myapp

ENV TZ Europe/Moscow

RUN pecl install -o -f redis \
&&  rm -rf /tmp/pear \
&&  docker-php-ext-enable redis

RUN ["apt", "update"]
RUN ["apt", "install", "redis-server", "-y"]

RUN apt-get upgrade -y && \
    apt-get install -y git

RUN ["apt", "install", "-y", "vim"]

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN ["/usr/local/bin/composer", "install"]