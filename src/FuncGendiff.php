<?php

namespace Hexlet\Code\FuncGendiff;

use function Hexlet\Code\Functions\Standard\encodeBoolToString__tab;
use function Hexlet\Code\Functions\Standard\getPROJECTPaths;
use function Hexlet\Code\Functions\Diff\genDiff as gendiff_process;
use function Hexlet\Code\Functions\Standard\getPathnameByPWD;

/**
 * модификация функции encodeTabToString для проекта: мод $row, код-копия
 */
function encodeTabToString__(array $arr_real, string $setGlue = ' ', string $setBrkt = '{outer}'): string
{
    $arr = encodeBoolToString__tab($arr_real);

    $result = '';
    foreach ($arr as $row_arr) {
        $row = $row_arr['status'] . ' ' . $row_arr['name'] . ': ' . $row_arr['value'];

        switch ($setBrkt) {
            case '[]':
                $row = '[' . $row . ']';
                break;
            case '{}':
                $row = '{' . $row . '}';
                break;
            }

        $result .= "$row" . "\n";
    }

    switch ($setBrkt) {
        case '[]':
        case '[outer]':
            $result = '[' . "\n" . $result . "]\n";
            break;
        case '{}':
        case '{outer}':
            $result = '{' . "\n" . $result . "}\n";
            break;
        }

    return $result;    
}

/**
 * Выбор функции для формат-структура (представление) данных
 * 
 */
function encodeTabToFormats(array $gendiff_result, $format = 'string'): string
{
    switch ($format) {
        case 'text':
        case 'string':
            $result = encodeTabToString__($gendiff_result);
            break;
        case 'json':
            $result = json_encode($gendiff_result);
            break;
        default:
            $result = $gendiff_result;
            break;
    }
    
    return $result;
}

/**
 * WD: процесс-получение pathname
 * Предназначение: для дополнительная директория для поиска файлов относительно WD
 * если проект-php структуры "WD__php" (по умолчанию)
 * если проект-зависимость "WD__rel"
 * если файл-скрипт отдельный "WD__script"
 */
function getWD(string $mode = 'WD__php'): array
{
    $WD = getPROJECTPaths()[$mode];

    return $WD;
}

/**
 * Функция-скрипт (функция подобие скрипт, крупная функция, Функция из нескольких процессов)
 * Структура подобие скрипт:
 * - Аргументы как у скрипта, определяют внутренние опции
 * - кроме выполнения, те не содержит Composer autoload подключение
 * - кроме docopt
 * - кроме Характеристики проект-задача, входящие данные FS: процесс-получение
 * 
 * Одноименная функция \Diff\genDiff относится к процесс-обработка данных as gendiff_process
 */
function gendiff($file1_pathname, $file2_pathname, $format = 'string')
{
    ### Задача-часть. Характеристики проект-задача, входящие данные FS: процесс-преобразование (абсолютный)
    $file1_pathname = getPathnameByPWD($file1_pathname);
    $file2_pathname = getPathnameByPWD($file2_pathname);
    // $format = $format ?? 'stylish'; // разрабатывается далее


    ### Задача-часть. Данные FS: процесс-проверка
    if (!file_exists($file1_pathname)) {
        throw new \exception('Error. файл1 путь относительно WD: ' . $file1_pathname);
    }

    if (!file_exists($file2_pathname)) {
        throw new \exception('Error. файл2 путь относительно WD: ' . $file2_pathname);
    }


    ### Задача-часть. Данные входящие: процесс-обработка diff
    // Результат (данные исходящие): arr
    $gendiff_result = gendiff_process($file1_pathname, $file2_pathname);


    ### Задача-часть. Результат (данные исходящие): формат-структура (представление)
    $gendiff_toString = encodeTabToFormats($gendiff_result);


    ### Задача-часть. Результат (данные исходящие): хранение FS (файл), показ
    print_r($gendiff_toString);
}

