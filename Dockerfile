FROM php:8.5

WORKDIR /var/www/html

COPY . .

# zip, unzip, git 설치 추가
RUN apt-get update \
    && apt-get install -y zip unzip git \
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && rm composer-setup.php

RUN composer install

CMD ["php", "-S", "0.0.0.0:8000"]