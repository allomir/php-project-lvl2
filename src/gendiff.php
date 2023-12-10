<?php

### Настройка проекта. namespace. namespace скрипты, модули
namespace Hexlet\Code;

use function Hexlet\Code\Functions\Standard\getTabDiff;
use function Hexlet\Code\Functions\Standard\encodeTabToString__gendiff;

## Задача-функция. Файлы Данные json сравнение {представление: string}

function gendiff(string $file_1_path, string $file_2_path)
{
    ### Задача. Данные: Получение

    $file_1_data = \json_decode(file_get_contents($file_1_path), true);
    $file_2_data = \json_decode(file_get_contents($file_2_path), true);

    ### Задача. Вариант-Алгоритм (решение) 

    $gendiff_result = getTabDiff($file_1_data, $file_2_data);

    ### Задача. Результаты: представление

    return encodeTabToString__gendiff($gendiff_result);
}

