<?php

### Настройка проекта. namespace. namespace скрипты, модули
namespace Hexlet\Code;

## Задача. Файлы Данные json сравнение

function gendiff(string $file_1_path, string $file_2_path): array
{
    require_once(__DIR__ . '/../src/Functions/Standard.php');

    $gendiff_result = [];

    if (!isset($file_1_path)) {
        return $gendiff_result;
    }
    if (!isset($file_2_path)) {
        return $gendiff_result;
    }

    $file_1_data_array = json_decode(file_get_contents($file_1_path), true);
    $file_2_data_array = json_decode(file_get_contents($file_2_path), true);

    $gendiff_result = \Hexlet\Code\Functions\Standard\gendiffData($file_1_data_array, $file_2_data_array);

    return $gendiff_result;
}
