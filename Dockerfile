# Base image
FROM php:8.4-apache

# Install PHP extensions needed by Yii2
RUN docker-php-ext-install pdo 

# Install Git + unzip for Composer
RUN apt-get update && apt-get install -y git unzip && rm -rf /var/lib/apt/lists/*

# Enable Apache rewrite module
RUN a2enmod rewrite

# Point Apache to Yii2 public folder
RUN sed -i 's|/var/www/html|/var/www/html/web|g' /etc/apache2/sites-available/000-default.conf
RUN sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . /var/www/html

# Ensure runtime and assets are writable
RUN mkdir -p web/assets web/runtime runtime && \
    chown -R www-data:www-data web/assets web/runtime runtime && \
    chmod -R 775 web/assets web/runtime runtime

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP dependencies for production
RUN composer install --no-dev --optimize-autoloader

# Expose web server port
EXPOSE 80

# Start Apache in foreground
CMD ["apache2-foreground"]