FROM debian:buster-slim

RUN apt-get update && \
	apt-get -y install curl

WORKDIR /client

COPY ./bthloggen.bash server.txt /client/
