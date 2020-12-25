FROM php:8.0-fpm-alpine3.12

ARG USER=nemesis
ARG ID=1000

COPY ./ /var/www

RUN apk add --no-cache \
    bash \
    curl \
    freetype-dev \
    g++ \
    gcc \
    git \
    icu-dev \
    icu-libs \
    imagemagick \
    libc-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    libzip-dev \
    make \
    mysql-client \
    nodejs \
    nodejs-npm \
    oniguruma-dev \
    yarn \
    openssh-client \
    postgresql-libs \
    postgresql-dev \
    rsync \
    supervisor \
    zlib-dev

RUN docker-php-ext-install  pdo pdo_pgsql mbstring zip exif pcntl

 # Adding user
RUN adduser \
    --disabled-password \
    --gecos "" \
    --home "$(pwd)" \
    --no-create-home \
    --uid ${ID} \
    ${USER}


WORKDIR /var/www

USER ${ID}:${ID}
