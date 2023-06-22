<?php

### Настройка проекта. namespace. namespace скрипты, модули
namespace Hexlet\Code\Tests\Functions\StandardByWebmozartTest;

### Настройка проекта. namespace. настройка Composer autoload. список загрузки
use Webmozart\Assert\Assert;

use function Hexlet\Code\Functions\Standard\getNumberAsWord;

## Список 1. Тесты-функции. Functions\Standard
function testGetNumberAsWord(): void
{
    # Список Утверждения истиности webmozart/assert
    Assert::eq(getNumberAsWord(3), 'three');
    Assert::eq(getNumberAsWord(99), '');

    # Результат теста
    echo "StandardByWebmozartTest getNumberAsWord: ok";
    echo PHP_EOL;
}
