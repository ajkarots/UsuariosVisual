FROM php:8.2-apache

# Copia los archivos de tu proyecto al contenedor
COPY . /var/www/html/

# Habilita módulos necesarios (opcional)
RUN docker-php-ext-install mysqli

EXPOSE 80
