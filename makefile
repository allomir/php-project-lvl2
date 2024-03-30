# Project gendiff
validate:
	composer validate

# Packajes
install:
	composer install

# Testing
lint:
	composer --verbose exec -- phpcs --standard=PSR12 \
	src/FuncGendiff.php \
	bin/gendiff tests \
	src/Functions/Standard.php \
	src/Functions/Diff.php

lint-fix:
	composer --verbose exec -- phpcbf --standard=PSR12 \
	src/FuncGendiff.php \
	bin/gendiff tests \
	src/Functions/Standard.php \
	src/Functions/Diff.php

test-byPHP:
	php tests/tests.php

phpunit:
	composer --verbose exec phpunit -- tests

phpunit-coverage:
	composer --verbose exec phpunit -- tests --coverage-text

phpunit-coverage-html:
	composer --verbose exec phpunit -- tests --coverage-html coverage
