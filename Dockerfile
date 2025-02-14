# Use the official PHP 8.0 Apache image
FROM php:8.0-apache

# Set the working directory
WORKDIR /var/www/html

# Copy the challenge files into the container
COPY ./challenge .

# Copy the custom Apache configuration
COPY apache.conf /etc/apache2/sites-available/000-default.conf
 
RUN chown www-data:www-data /var/www/html/messages.txt && \
    chmod 644 /var/www/html/messages.txt

# Enable the rewrite module
RUN a2enmod rewrite

# Expose port 80
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]