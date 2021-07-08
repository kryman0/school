FROM node:8

WORKDIR /server

COPY package*.json ./

RUN npm install

RUN mkdir data

COPY / ./

CMD ["npm", "start"]
