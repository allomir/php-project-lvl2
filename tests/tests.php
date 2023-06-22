<?php

### Настройка проекта. namespace. namespace скрипты, модули
namespace Hexlet\Code\Tests;

### Настройка проекта. namespace. настройка Composer autoload. список загрузки
use Hexlet\Code\Tests\Functions\StandardByPHPTest;
use Hexlet\Code\Tests\Functions\StandardByWebmozartTest;

### Настройка проекта. namespace. настройка Composer autoload ~ Абсолютный путь с ..
$status_result = null;
$autoload1 = __DIR__ . "/../vendor/autoload.php";
$autoload2 = __DIR__ . "/../../../vendor/autoload.php";

if (file_exists($autoload1)) {
    $status_result = require_once($autoload1);
} else {
    $status_result = require_once($autoload2);
}

echo "namespace. настройка Composer autoload: ";
if ($status_result) {
    echo('Выполнено');
} else {
    echo('Не выполено');
}
echo PHP_EOL;

### Часть 1. Тестирование Standard
echo "Результаты:" . PHP_EOL;
StandardByPHPTest\testGetNumberAsWordVar1();
StandardByPHPTest\testGetNumberAsWordVar2();
StandardByWebmozartTest\testGetNumberAsWord();
