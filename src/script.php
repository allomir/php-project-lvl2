<?php

### Настройка проекта. namespace. namespace скрипты, модули
namespace Hexlet\Code;

### Настройка проекта. namespace. настройка Composer autoload. список загрузки
use Hexlet\Code\Functions\Standard;

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


## Задача сложные (несколько функций). Структура задачи
### Часть 1. Данные: разные. Действия: получение

$arg1 = 3;
$result = Standard\getNumberAsWord($arg1);

echo "Получение число как слово. Результат: $result";
echo PHP_EOL;

### Часть 2.
## Список. Функции: Использование (аналог тестирование вручную)
### Часть 1. Функции стандартные: Использование
