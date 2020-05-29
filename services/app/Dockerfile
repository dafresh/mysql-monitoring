FROM php:7.4-cli

RUN docker-php-ext-install pdo_mysql

RUN apt update

RUN apt install -y cron nano

COPY ./config/cron/crontab /etc/cron.d/crontab
RUN crontab /etc/cron.d/crontab
