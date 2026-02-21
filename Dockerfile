FROM php:8.4-apache

# Install extensions Yii2 needs
RUN docker-php-ext-install pdo

# Enable Apache rewrite
RUN a2enmod rewrite

# Install Git + unzip for Composer
RUN apt-get update && apt-get install -y git unzip && rm -rf /var/lib/apt/lists/*

# Set working directory
WORKDIR /var/www/html

# Copy project
COPY . /var/www/html

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

EXPOSE 8080

CMD ["apache2-foreground"]