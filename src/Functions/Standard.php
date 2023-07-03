<?php

### Настройка проекта. namespace. namespace скрипты, модули
namespace Hexlet\Code\Functions\Standard;

## Список 1. Функции. Стандартные. Данные, виды: разные, Данные, действия: разные

function getListNumbersAsWords(): array
{
    # Данные, виды: список индексированный массив
    # Алгоритм (действия):
        # массивы: хранение
    # результат: Данные: массивы список (индексированный массив)

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
    # Данные, виды: массивы
    # Алгоритм (действия): получение, фильтрация
    # результат: строка, название числа

    $arr = getListNumbersAsWords();
    $result = $arr[$num] ?? '';

    return $result;
}

## Список 2. Функции. Данные и форматы. Данные, виды: разные, Данные, действия: разные

### Название
### (Functions/DataFormats.php/$formatTabStringToTabArray)
function formatStringsToTabArray(string $strings): array
{
    # Данные, виды: строки список характеристики
    # Алгоритм (действия):
        # чтение строки
        # преобразование строки в массив характеристика название значение
        # хранение характеристики в массив
    # результат: индексированный массив список характеристики

    $strings_array = explode($strings, "\n");
    $tab_array = [];
    foreach ($strings_array as [$string]) {
        $tab_array[] = explode($string, ': ');
    }

    return $tab_array;
}

### json_decode()
    # функции php стандартные

### Название
### (Functions/DataFormats/formatArraysIdToItems)
function formatArraysIdToItems(array $array, string $entry = 'name'): array
{
    $result = [];

    foreach ($array as $key => $value) {
        $result[] = ["$entry" => $key, "value" => $value];
    }

    return $result;
}

## Функция. Данные массивы сравнение
function gendiffData(array $data_1, array $data_2): array
{
    # Задани: сравнение файлы данные
    # Данные: массивы ассоциативные характеристика -> значение
    # Алгоритм (действия):
        # характеристика, сущ-е (поиск) из файл 2 в 1 файл: false
            # result: [характеристика, значение, +]
        # характеристика, сущ-е: true (связь выше). значения ===: true
        # характеристика, сущ-е: true (связь выше). значения !==: true
    # результат: массив ассоциативный список [характеристика, значение, статус]
    $status_eq = '';
    $status_new = '+';
    $status_del = '-';

    $data_eq = array_intersect_key($data_1, $data_2);
    $data_eq = \Hexlet\Code\Functions\Standard\formatArraysIdToItems($data_eq);

    $data_eq_result = [];
    foreach ($data_eq as $item) {
        $item_result = $item;
        $value = $item['value'];
        $value_1 = $data_1[$item['name']];
        $value_2 = $data_2[$item['name']];

        if ($value_2 === $value_1) {
            $item_result['status'] = $status_eq;
            $data_eq_result[] = $item_result;
        } else {
            $item_result['value'] = $value_1;
            $item_result['status'] = $status_del;
            $data_eq_result[] = $item_result;
            $item_result['value'] = $value_2;
            $item_result['status'] = $status_new;
            $data_eq_result[] = $item_result;
        }
    }

    $data_new = array_diff_key($data_1, $data_2);
    $data_new = \Hexlet\Code\Functions\Standard\formatArraysIdToItems($data_new);
    $data_new = array_map(function ($item) use ($status_del) {
        $item['status'] = $status_del;
        return $item;
    }, $data_new);

    $data_del = array_diff_key($data_2, $data_1);
    $data_del = \Hexlet\Code\Functions\Standard\formatArraysIdToItems($data_del);
    $data_del = array_map(function ($item) use ($status_new) {
        $item['status'] = $status_new;
        return $item;
    }, $data_del);


    return [...$data_eq_result, ...$data_new, ...$data_del];
}
