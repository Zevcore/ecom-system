FROM node:12.22.12

WORKDIR /app

COPY package*.json ./

RUN npm install

COPY . .

CMD ["npm", "run", "serve"]

EXPOSE 8081