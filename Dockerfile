FROM php:8.0-cli
WORKDIR /app
COPY /challenge /app
EXPOSE 8000
CMD ["php", "-S", "0.0.0.0:8000"]
