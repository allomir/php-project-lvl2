# project
script-php:
	php src/script.php

script-cli:
	./bin/script

validate:
	composer validate

# packajes
install:
	composer install

# packajes. Тесты
lint:
	composer --verbose exec phpcs -- --standard=PSR12 src bin tests

testing:
	php tests/tests.php

phpunit:
	composer --verbose exec phpunit -- tests

phpunit-coverage:
	composer --verbose exec phpunit -- tests --coverage-text

phpunit-coverage-html:
	composer --verbose exec phpunit -- tests --coverage-html coverage
