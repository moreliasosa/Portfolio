FROM php:8.1.1-apache

RUN apt-get update && apt-get upgrade -y
RUN docker-php-ext-install mysqli 
RUN docker-php-ext-enable mysqli 
