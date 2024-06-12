# Use the official PHP image with FPM
FROM php:8.2-fpm

# Set the working directory
WORKDIR /var/www/symfony

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpq-dev \
    wget \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Symfony CLI
RUN wget https://get.symfony.com/cli/installer -O - | bash && \
    mv /root/.symfony*/bin/symfony /usr/local/bin/symfony

# Copy existing application directory contents
COPY . /var/www/symfony

# Install PHP dependencies
RUN composer install --prefer-dist --no-progress --no-suggest --no-interaction

# Expose port 8000 and start Symfony server
EXPOSE 8000
CMD ["symfony", "serve", "--no-tls", "--port=8000"]
