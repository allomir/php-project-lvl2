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

function getProjectName()
{
    $fileComposerName = 'composer.json';
    $WDPathname = getWDpathname()['path'];
    $fileComposerData = json_decode($WDPathname . '/' . $fileComposerName);

    return $fileComposerData['name'];
}

/**
 * Script (файл-исполнитель интерпритируемый, bin-file, точка входа, index.php) 
 * Script.Path состоит WD/(src | bin), кроме vendor/
 *      для проект-php
 *      script.Path относительно PWD: $_SERVER['PWD'] $_SERVER['SCRIPT_FILENAME']
 *      script.Path относительно PWD (интерпретатор php внешний): $_SERVER['argv'][0] арг-0
 *          $_SERVER['argv'][0] соответствует $_SERVER['SCRIPT_FILENAME']
 *          аналог script.Pathname: __FILE__ 
 *              только внутри скрипта
 * Script.Path состоит projectCurrent/vendor/projectVendor/projectName/(src | bin)
 *      для проект-зависимость
 *      vendor/project: composer.json.data.name = hexlet/code
 *      ипользование script необходимо учитывать окружение $_SERVER
 */
function getScriptPathname($scriptPathname = ''): array
{
    $path = [
        'pathname' => '',
        'path' => '',
        'name' => '',
    ];

    $path['pathname'] = getPathnameByPWD($_SERVER['SCRIPT_FILENAME']);
    $path['name'] = basename($paths['pathname']);
    $path['path'] = dirname($paths['pathname']);

    return $path;
}

/**
 * Рабочая директория (WD, Путь проекта)
 * WD.Path относительно scripts (для проект php): ../../.. от bin (на 3 уровня выше)
 * WD.Path относительно scripts (для проект-зависимость): ../../../../.. от bin (на 5 уровня выше)
 *      состоит дополнительно /vendor/projectVendor/projectName
 */
function getWDPathname(): array
{
    $path = [
        'pathname' => '',
        'path' => '',
        'name' => '',
    ];

    $path['pathname'] = dirname(getScriptPathname()['pathname'], 2);
    $path['path'] = dirname($path['pathname'], 1);
    $path['name'] = basename($path['pathname']);

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
        # сортировка сделана в getTabDiff с помощью sort() и заполнения в правильном порядке
        # но для точной сортировки сделать сортировать таблицы по характеристикам
        # также позволит сделать другие сортировки
        # выполнить на основе collection()
    return $tab;
}

/**
 * Формат-представление результата $arr_real ввиде строка с модвнутренние скобки и разделитель
 * $setGlue разделитьель значений в строке:
 * $setBkt скобки строк и наружные: [outer] только наружные скобки
 *
 * !TODO Вариант 2. encodeTabToString2 (encodeTabToStringRow, encodeTabToStringRow)
 *      модифицировать $row с помощью лямбда-функция
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
