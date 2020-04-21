FROM php:7.3-apache-buster

# Instalamos las extensiones de php, yarn, habilitamos apache rewrite
RUN apt-get update && apt-get install -y \ 
    libxml2-dev libpng-dev libpq-dev libcurl4-openssl-dev \
    libmcrypt-dev gnupg2 git libzip-dev unzip && \
    docker-php-ext-install xml && \
    docker-php-ext-install gd && \
    docker-php-ext-install pdo_pgsql && \
    docker-php-ext-install curl && \
    docker-php-ext-install zip && \
    curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - && \
    echo "deb https://dl.yarnpkg.com/debian/ stable main" | \
    tee /etc/apt/sources.list.d/yarn.list && apt-get update && \
    apt-get install -y yarn && \
    a2enmod rewrite && service apache2 restart

# Instalamos Composer desde la imagen oficial
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Para tener color en la terminal
ENV TERM xterm-256color

# Parámetros de la imagen
ARG APP_ENVIRONMENT
ARG PROYECTO_DIR

# Usamos la configuración por defecto que trae la imagen
RUN if [ $APP_ENVIRONMENT = "prod" ]; \
    then export DEFAULT_PHP_INI_ENV='production'; \
    else export DEFAULT_PHP_INI_ENV='development'; fi && \
    mv "$PHP_INI_DIR/php.ini-${DEFAULT_PHP_INI_ENV}" "$PHP_INI_DIR/php.ini"

# Copiamos el código fuente
WORKDIR $PROYECTO_DIR
ADD composer.json $PROYECTO_DIR

# Instalamos las dependencias
RUN composer install
