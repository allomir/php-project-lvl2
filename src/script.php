<?php

### Настройка проекта. namespace. namespace скрипты, модули
namespace Hexlet\Code;

### Настройка проекта. namespace. настройка Composer autoload. список загрузки
use Hexlet\Code\Functions\Standard;

use function Hexlet\Code\gendiff;

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
### Часть 2. Алгоритм (решение)
### Часть 3. Результат: показ, хранение

## Список. Функции стандартные: Использование (аналог тестирование вручную)
### Название (echo)
$arg1 = 3;

$result = Standard\getNumberAsWord($arg1);

echo "Получение число как слово. Результат: $result";
echo PHP_EOL;

### Название (echo)
$file_1_path = __DIR__ . '/file1.json';
$file_2_path = __DIR__ . '/file2.json';

$result = gendiff($file_1_path, $file_2_path);

echo "Файлы данные json сравнение. Резуьтат:";
echo PHP_EOL;
print_r($result);
