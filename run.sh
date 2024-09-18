#!/bin/bash

# activate the mysqli extension in the php config
echo 'extension=mysqli' >> /etc/php/8.1/cli/php.ini

# start the mysql service
service mysql start
# Create the database and our user
mysql < /setup.sql

# start apache2
apachectl -D FOREGROUND