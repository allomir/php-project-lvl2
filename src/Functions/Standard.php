<?php

### Настройка проекта. namespace. namespace скрипты, модули
namespace Hexlet\Code\Functions\Standard;

## Список 1. Функции. Стандартные. Данные, виды: разные, Данные, действия: разные

/**
 * `filesystem(FS)
 * Получение путь абс из путь относительно PWD
 * Путь относительно содержит ./ или первый не /
 * Если путь абс (первый /) то возвращается то же значение
 */
function getPathnameByPWD(string $pathname): string
{
    if (strpos($pathname, './') === 0) {
        $pathname = $_SERVER['PWD'] . '/' . substr($pathname, 2);
    } elseif (strpos($pathname, '/') !== 0) {
        $pathname = $_SERVER['PWD'] . '/' . $pathname;
    }

    return $pathname;
}

/**
 * Характеристика проекта. Директории WD, script
 * Пути делаются абс.
 * Путь проекта (рабочая директория) относительный: ../../.. относительно bin (на 3 уровня выше) если проект php
 * Путь проекта (рабочая директория) относительный: ../../../.. относительно bin (на 4 уровня выше) если проект как зависимость
 * Путь проекта (рабочая директория) относительный: на том же уровне относительно bin если скрипт как один файл
 */
function getPROJECTPaths(): array
{
    $paths = [
        'WD__php' => [
            'pathname' => '',
            'path' => '',
            'name' => '',
        ],
        'WD__rel' => [
            'pathname' => '',
            'path' => '',
            'name' => '',
        ],
        'WD__script' => [
            'pathname' => '',
            'path' => '',
            'name' => '',
        ],
        'SCRIPT' => [
            'pathname' => '',
            'path' => '',
            'name' => '',
        ]
    ];

    $paths['SCRIPT']['pathname'] = getPathnameByPWD($_SERVER['SCRIPT_FILENAME']);
    $paths['SCRIPT']['name'] = basename($paths['SCRIPT']['pathname']);
    $paths['SCRIPT']['path'] = dirname($paths['SCRIPT']['pathname']);

    $paths['WD__php']['pathname'] = dirname($paths['SCRIPT']['pathname'], 2);
    $paths['WD__php']['path'] = dirname($paths['SCRIPT']['pathname'], 3);
    $paths['WD__php']['name'] = basename($paths['WD__php']['pathname']);

    $paths['WD__rel']['pathname'] = dirname($paths['SCRIPT']['pathname'], 2);
    $paths['WD__rel']['path'] = dirname($paths['SCRIPT']['pathname'], 3);
    $paths['WD__rel']['name'] = basename($paths['WD__rel']['pathname']);

    $paths['WD__script']['pathname'] = dirname($paths['SCRIPT']['pathname']);
    $paths['WD__script']['path'] = dirname($paths['SCRIPT']['pathname'], 1);
    $paths['WD__script']['name'] = basename($paths['WD__script']['pathname']);


    return $paths;
}

/**
 * Название: Получение Список ключи уникальные из всех элементов
 * Алгоритм:
 * - преобразование ключей в значение
 * - слияние значение с помощью цикла, добавление к общей совокупности
 * - удаление повторяющихся значений
 */
function getListKeys(array ...$lists): array
{
    $keys = [];
    foreach ($lists as $list) {
        $keys = [...$keys, ...array_keys($list)];
    }

    return array_unique($keys);
}

/**
 * Название: Получение Список значения уникальные из всех элементов
 * Алгоритм:
 * - слияние значений с помощью цикла, добавление к общей совокупности
 * - удаление повторяющихся значений
 */
function getListValues(array ...$lists): array
{
    $Values = [];
    foreach ($lists as $list) {
        $Values = [...$Values, ...$list];
    }

    return array_unique($Values);
}

function sortTab(array $tab): array
{
    # !TODO. Сортировка по характеристикам $file $name
        # сортировка сделана в getTabDiff с помощью сортировки характеристик sort() и заполнения в правильном порядке
        # но для точной и дополнительной сортировки необходимо уметь сортировать, уметь сортировать таблицы по характеристикам
        # также позволит сделать другие сортировки
        # выполнить на основе collection()
    return $tab;
}

/**
 * Формат-представление результата $arr_real ввиде строка с модвнутренние скобки и разделитель
 * $setGlue разделитьель значений в строке:
 * $setBkt скобки строк и наружные: [outer] только наружные скобки
 *
 * !TODO Вариант 2. encodeTabToString2 (encodeTabToStringRow, encodeTabToStringRow) модифицировать $row с помощью лямбда-функция
 */
function encodeTabToString(array $arr_real, string $setGlue = ' ', string $setBkt = ''): string
{
    $arr = encodeBoolToString__tab($arr_real);

    $result = '';
    foreach ($arr as $row_arr) {
        $row = implode($setGlue, $row_arr);

        switch ($setBkt) {
            case '[]':
                $row = '[' . $row . ']';
                break;
            case '{}':
                $row = '{' . $row . '}';
                break;
        }

        $result .= "$row" . "\n";
    }

    switch ($setBkt) {
        case '[]':
        case '[outer]':
            $result = '[' . "\n" . $result . ']\n';
            break;
        case '{}':
        case '{outer}':
            $result = '{' . "\n" . $result . '}\n';
            break;
    }

    return $result;
}

/**
 * Формат-представление данных булевых ввиде текста
 * null всегда как '' пустая строка
 */
function encodeBoolToString(bool $bool_real): string
{
    $arr_bools = [
        false => 'false',
        true => 'true',
    ];

    return $arr_bools[$bool_real];
}

/**
 * Рекурсивная функция
 * Формат-представление данных булевых ввиде текста в структурах строка или массив
 * null всегда как '' пустая строка
 * Возвращает и принимает mix строки и массивы
 */
function encodeBoolToString__tab($tab_real)
{
    if (is_bool($tab_real)) {
        return encodeBoolToString($tab_real);
    }

    if (is_array($tab_real)) {
        $arr = array_map(function ($value) {
            return encodeBoolToString__tab($value);
        }, $tab_real);

        return $arr;
    }

    return $tab_real;
}
