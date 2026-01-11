FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    default-mysql-client \
    && docker-php-ext-install mysqli \
    && docker-php-ext-enable mysqli

WORKDIR /var/www/html
COPY . .

CMD ["php", "-S", "0.0.0.0:8000", "-t", "/var/www/html"]
