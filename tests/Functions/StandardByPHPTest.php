<?php

### Настройка проекта. namespace. namespace скрипты, модули
namespace Hexlet\Code\Tests\Functions\StandardByPHPTest;

### Настройка проекта. namespace. настройка Composer autoload. список загрузки
use function Hexlet\Code\Functions\Standard\getNumberAsWord;

## Список 1. Тесты-функции. Functions\Standard
function testGetNumberAsWordVar1(): void
{
    # Список Утверждения истиности if Exception
    if (getNumberAsWord(3) !== 'three') {
        throw new \Exception("Результат функция неверно");
    }
    if (getNumberAsWord(99) !== '') {
        throw new \Exception('Функция работает неверно!');
    }

    # Результат теста
    echo "StandardByPHPTest 1 getNumberAsWord: ok";
    echo PHP_EOL;
}

function testGetNumberAsWordVar2(): void
{
    # Список Утверждения истиности assert()
    assert(getNumberAsWord(3) === 'three');
    assert(getNumberAsWord(99) === '');

    # Результат теста
    echo "StandardByPHPTest 2 assert() getNumberAsWord: ok";
    echo PHP_EOL;
}
