FROM php:8.3-fpm

# set your user name, ex: user=carlos
# ARG user=canal

# Install system dependencies
RUN apt-get update && apt-get install -y \
libzip-dev \
libpng-dev \
libonig-dev \
libxml2-dev \
jpegoptim optipng pngquant gifsicle \
libjpeg62-turbo-dev \
libfreetype6-dev \
locales \
libpq-dev \
vim \
zip \
unzip \
git \
curl \
libicu-dev \
default-mysql-client

# Install Node.js e NPM (Use o repositório NodeSource para instalar uma versão recente)
RUN curl -fsSL https://deb.nodesource.com/setup_22.x -o nodesource_setup.sh \
    && bash nodesource_setup.sh \
    && apt-get install -y nodejs

# Verificar instalação do Node.js e NPM
RUN node -v
RUN npm -v

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets # Substitua pdo_pgsql por pdo_mysql

# Install zip extension
RUN docker-php-ext-install zip

# Install exif extension
RUN docker-php-ext-install exif

# Install pcntl extension
RUN docker-php-ext-install pcntl

# Install intl extension
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user || echo "User $user already exists"
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Set working directory
WORKDIR /var/www

# Copy custom configurations PHP
COPY docker/php/custom.ini /usr/local/etc/php/conf.d/custom.ini

USER $user
