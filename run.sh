#!/bin/bash

echo 'extension=mysqli' >> /etc/php/8.1/cli/php.ini

service mysql start

mysql < /setup.sql

apachectl -D FOREGROUND