# Use official PHP with Apache
FROM php:8.2-apache

# Copy project files to web root
COPY . /var/www/html/

# Enable Apache rewrite (optional, if needed)
RUN a2enmod rewrite

# Expose default web port
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]