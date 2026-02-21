# Use PHP + Apache
FROM php:8.2-apache

# Skip optional extensions since no DB yet
RUN docker-php-ext-install pdo

# Enable Apache rewrite module for pretty URLs
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy project files into container
COPY . /var/www/html

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install dependencies for production
RUN composer install --no-dev --optimize-autoloader

# Expose port
EXPOSE 8080

# Start Apache
CMD ["apache2-foreground"]