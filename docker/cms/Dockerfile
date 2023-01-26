FROM node:16.16.0

WORKDIR /cms

COPY package*.json ./

RUN npm install

COPY . .

CMD ["npm", "run", "dev"]

EXPOSE 5173