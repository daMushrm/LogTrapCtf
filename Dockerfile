# Use the official PHP 8.0 CLI image
FROM php:8.0-cli

# Generate a random cookie value and set it as an environment variable
RUN openssl rand -base64 32 > /tmp/cookie && \
    export AUTH_COOKIE=$(cat /tmp/cookie) && \
    echo "AUTH_COOKIE=${AUTH_COOKIE}" >> /etc/environment

# Set the working directory
WORKDIR /app

# Copy the challenge files into the container
COPY ./challenge /app

# change directory to /app
WORKDIR /app

# Expose port 8000 for the PHP development server
EXPOSE 8000

# Start the PHP built-in web server
CMD ["php", "-S", "0.0.0.0:8000"]