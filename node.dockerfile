FROM node:15.10.0-alpine3.12

WORKDIR /var/www

COPY package*.json /var/www/
