FROM php:8.2-cli

WORKDIR /var/www/html

COPY . .

RUN mkdir -p /var/www/html/filesystem

EXPOSE 8000

CMD ["sh", "-c", "php /var/www/html/scripts/seed.php && php -S 0.0.0.0:8000 -t /var/www/html/public /var/www/html/public/serve.php"]
