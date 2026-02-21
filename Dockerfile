# Use PHP + Apache
FROM php:8.2-apache

# Install extensions Yii2 needs
RUN docker-php-ext-install pdo pdo_mysql mbstring

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