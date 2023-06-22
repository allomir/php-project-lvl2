<?php

### Настройка проекта. namespace. namespace скрипты, модули
namespace Hexlet\Code\Functions\Standard;

## Список 1. Функции (задачи простые). Данные разные: действия разные

function getListNumbersAsWords(): array
{
    # Данные: список (индексированный массив)
    # Алгоритм (действия): хранение
    # результат: список (индексированный массив)

    $arr = [
        1 => "one",
        2 => "two",
        3 => "three",
        4 => "four",
        5 => "five",
        6 => "six",
        7 => "seven",
        8 => "eight",
        9 => "nine",
        0 => "zero",
    ];

    return $arr;
}

function getNumberAsWord(int $num): string
{
    # Данные: массивы
    # Алгоритм (действия): получение, фильтрация
    # результат: строка, название числа

    $arr = getListNumbersAsWords();
    $result = $arr[$num] ?? '';

    return $result;
}
