FROM node:12.22.12

WORKDIR /app

COPY package*.json ./

RUN npm install

COPY . .

RUN chmod -R 777 node_modules

CMD ["npm", "run", "serve"]

EXPOSE 8081