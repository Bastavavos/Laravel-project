FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    nginx \
    supervisor \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    libzip-dev \
    libonig-dev \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    iputils-ping

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd

# copy nginx config
COPY nginx/conf.d/nginx-root.conf  /etc/nginx/nginx.conf
COPY nginx/conf.d/nginx.conf  /etc/nginx/sites-enabled/default
COPY supervisor.conf  /etc/supervisor/conf.d/supervisor.conf
COPY zz-docker.conf  /usr/local/etc/php-fpm.d/zz-docker.conf

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Two next commands are needed to run composer install in my personal config
# Adjust permissions & switch to www-data user
RUN chown -R www-data:www-data /var/www && chmod -R 755 /var/www
USER www-data

# Install project dependencies
RUN composer install

# Expose port 8000 and start php-fpm server
EXPOSE 8000

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisor.conf"]


