SHELL := /bin/bash

.PHONY: install update rector rector-dry test

install:
	composer install

update:
	composer update

rector:
	vendor/bin/rector process

rector-dry:
	vendor/bin/rector process --dry-run

test:
	vendor/bin/phpunit tests
