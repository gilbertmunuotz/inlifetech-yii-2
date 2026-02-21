FROM php:8.4-apache

# Install PHP extensions (minimal for now)
RUN docker-php-ext-install pdo

# Install Git + unzip for Composer
RUN apt-get update && apt-get install -y git unzip && rm -rf /var/lib/apt/lists/*

# Enable Apache rewrite
RUN a2enmod rewrite

# Point Apache to Yii2 public folder
RUN sed -i 's|/var/www/html|/var/www/html/web|g' /etc/apache2/sites-available/000-default.conf
RUN sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Set working directory
WORKDIR /var/www/html

# Copy project
COPY . /var/www/html

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

EXPOSE 80
CMD ["apache2-foreground"]