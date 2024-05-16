FROM php:8.0-fpm

# Cài đặt các gói cần thiết
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    libssl-dev \
    libcurl4-openssl-dev

# Cài đặt các tiện ích mở rộng PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Cài đặt Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Sao chép mã nguồn vào container
COPY . /var/www/html

# Đặt thư mục làm việc
WORKDIR /var/www/html

# Cài đặt các phụ thuộc của Laravel
RUN composer install

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
