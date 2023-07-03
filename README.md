### Hexlet tests and linter status:
[![Actions Status](https://github.com/allomir/php-project-lvl2/workflows/hexlet-check/badge.svg)](https://github.com/allomir/php-project-lvl2/actions)
[![badge action-make](https://github.com/allomir/php-project-lvl2/actions/workflows/action-make.yml/badge.svg)](https://github.com/allomir/php-project-lvl2/actions/workflows/action-make.yml)

## Проект учебный php level 2 by Hexlet
### Характеристики
- Vendor: [allomir](https://github.com/allomir)
- Project: [php-project-lvl2](https://github.com/allomir/php-project-lvl2)

### Настройка проекта (последовательность)
- $ git clone git@github.com:allomir/php-project-lvl2.git _project-hexlet-code-lvl2
- $ git init
- $ git add .
- $ git commit -m "start"
- $ git push
- /.gitignore

- $ composer init
    #### hexlet/code
- /composer.json/$
    #### "bin": ["bin/gendiff"]
    #### "autoload-dev": {
        "psr-4": {
            "Hexlet\\Code\\Tests": "tests/"
        }
    },

- $ composer require --dev "squizlabs/php_codesniffer"
- $ composer require --dev phpunit/phpunit

- /bin/gendiff
- /tests
- /src
- /README.md

- /makefile

- /.github/workflows/action-make.yml
- /README.md/: badge action-make

### Задание 1.1. Скрипт Файлы данные сравнение
- $ composer require docopt/docopt

- /bin/gendiff
    - Скрипт Файлы данные сравнение
    - настройка docopt, данные получение, решение, результат массив

### Задание 1.2. Функция файлы данные сравнение
- /src/script.php
    - функция запуск
- /src/gendiff.php
    - функция файлы данные сравнение
- /src/Functions/Standard.php
    - функция данные массив сравнение
    - функции данные и формат массив-характеристики в массив элементы
    - функции данные и формат массив-характеристики в массив элементы
