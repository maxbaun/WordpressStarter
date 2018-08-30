FROM wordpress:latest

RUN apt-get update

COPY dist /usr/src/wordpress/wp-content/themes/themeName

RUN chown -R www-data:www-data /usr/src/wordpress/

RUN a2enmod rewrite
RUN a2enmod expires
RUN a2enmod headers

WORKDIR /var/www/html
