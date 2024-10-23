FROM ubuntu:22.04

# Install Apache2
RUN apt-get update
RUN apt-get install apt-utils
RUN apt-get install -y apache2

# Install PHP
ENV DEBIAN_FRONTEND="noninteractive" TZ="Europe/Paris"
RUN apt-get update
RUN apt-get install -y php libapache2-mod-php

# Always usefull for debug
RUN apt-get install -y net-tools vim

# Apache2 configuration
COPY config/apache2.conf /etc/apache2/apache2.conf
COPY config/000-default.conf /etc/apache2/sites-available/000-default.conf

# Application data
COPY ./bricks/ /var/www/bricks/
RUN chmod -R 777 /var/www/bricks/

# Install MySQL
RUN apt-get install -y mysql-server php-mysql

# activate the mysqli extension in the php config
RUN echo 'extension=mysqli' >> /etc/php/8.1/cli/php.ini

# Setup the SQL database
COPY config/setup.sql /setup.sql

COPY run.sh /run.sh
RUN chmod +x /run.sh

EXPOSE 80
CMD ["/run.sh"]
