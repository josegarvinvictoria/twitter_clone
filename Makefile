#!/usr/bin/make
SHELL = /bin/bash

# Include .env if exists to load the PROJECT_NAME variable
# -include .env

# PROJECT_NAME := $(shell [ -z "${PROJECT_NAME}" ] && basename `pwd` || echo ${PROJECT_NAME})
# export PROJECT_NAME
# export COMPOSE_PROJECT_NAME=${USER}_${$PROJECT_NAME}

# Generate developer variables nees it in docker-compose.yml
DEVELOPER_USER_ID := $(shell id -u)
DEVELOPER_GROUP_ID := $(shell id -g)
DEVELOPER_GROUP_NAME := $(shell id -g -n)

export DEVELOPER_USER_ID
export DEVELOPER_GROUP_ID
export DEVELOPER_GROUP_NAME

HELP_FUN = \
        %help; \
        while(<>) { push @{$$help{$$2 // 'options'}}, [$$1, $$3] if /^(\w+)\s*:.*\#\#(?:@(\w+))?\s(.*)$$/ }; \
        print "usage: make [target]\n\n"; \
    for (keys %help) { \
        print "$$_:\n"; $$sep = " " x (20 - length $$_->[0]); \
        print "  $$_->[0]$$sep$$_->[1]\n" for @{$$help{$$_}}; \
        print "\n"; }

help: ##@miscellaneous Show this help.
	@perl -e '$(HELP_FUN)' $(MAKEFILE_LIST)

dps: ##@docker docker-composer ps
	docker-compose up
du: ##@docker docker-composer up and build
	docker-compose up -d --build
db: ##@docker docker-composer build
	docker-compose build
ds: ##@docker docker-composer stop
	docker-compose stop
de_server: ##@docker docker-composer enter server container
	docker-compose exec server sh
de_php: ##@docker docker-composer enter server container
	docker-compose exec php sh
dd: ##@docker docker-composer down and remove images
	docker-compose down --rmi local
dl: ##@docker docker-composer show logs
	docker-compose logs
dlf: ##@docker docker-composer show logs and follow
	docker-compose logs -f
dstart: ##@docker docker-composer start
	docker-compose start
test: ##@tests execute php composer test and npm test
	docker-compose exec --user ${USER} server composer test
	docker-compose exec --user ${USER} server npm run test
test-php: ##@tests execute php composer test
	docker-compose exec --user ${USER} server composer test
test-node: ##@tests execute npm test
	docker-compose exec --user ${USER} server npm run test
node-lint: ##@tests execute npm run lint
	docker-compose exec --user ${USER} server npm run lin
node-lint-fix: ##@tests execute npm run lint:fix
	docker-compose exec --user ${USER} server npm run lint:fix
