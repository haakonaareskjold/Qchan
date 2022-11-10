FROM node:16-alpine3.12

WORKDIR /var/www

COPY package*.json /var/www/
