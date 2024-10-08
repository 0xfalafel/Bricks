#!/bin/bash

# start the mysql service
service mysql start
# Create the database and our user
mysql < /setup.sql

# start apache2
apachectl -D FOREGROUND