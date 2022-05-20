FROM node:14.14.0

WORKDIR /var/www

COPY package*.json ./

RUN npm install

COPY . .

RUN npm run serve

EXPOSE 8081