include .env
export

DC=docker-compose
MAIN_YML=-f docker-compose.yml

all:
up: down build
	$(DC) $(MAIN_YML) up -d
build: down
	$(DC) $(MAIN_YML) build
up-logs: down build
	$(DC) $(MAIN_YML) up
down:
	$(DC) $(MAIN_YML) down
