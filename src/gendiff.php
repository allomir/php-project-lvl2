<?php

namespace Hexlet\Code\gendiff;

### Настройка проекта. namespace. настройка Composer autoload. список загрузки
use function Hexlet\Code\Functions\DataFormats\selectorEncodeTabArrToFormat;
use function Hexlet\Code\Functions\DataAggregate\tabDiff;
use function Hexlet\Code\Functions\FS\getFilePathnameMainset;
use function Hexlet\Code\Functions\FS\checkFileMainset;

/**
 * Функция-скрипт (функция-скрипт, функция-проект)
 * Структура подобие скрипт:
 * - Аргументы как у скрипта, определяют внутренние опции
 * - кроме выполнения, те не содержит Composer autoload подключение
 * - кроме docopt
 * - кроме Характеристики проект-задача, входящие данные FS: процесс-получение
 */
function gendiff($file1_pathname, $file2_pathname, $format = 'string')
{
    ### Задача-часть. Данные FS: характеристики Путь абс
    $file1_pathname = getFilePathnameMainset($file1_pathname);
    $file2_pathname = getFilePathnameMainset($file2_pathname);
    // $format = $format ?? 'stylish'; // разрабатывается далее

    ### Задача-часть. Данные FS: процесс-проверка
    checkFileMainset($file1_pathname);
    checkFileMainset($file2_pathname);

    ### Задача-часть. Данные обработка: сравнение совокупности характеристик (обработка, diff) двух файлов
    // Результат (данные исходящие): формат arr
    $gendiff_result = tabDiff($file1_pathname, $file2_pathname);

    ### Задача-часть. Данные обработка: формат strings
    $gendiff_result__formatString = selectorEncodeTabArrToFormat(
        $tabArr = $gendiff_result,
        $format = 'string',
        $brackets = '[]',
        $funcItem = function ($item) {
            return $item['status'] . ' ' . $item['name'] . ': ' . $item['value'];
        }
    );

    ### Задача-часть. Данные хранение-просмотр: просмотр strings
    print_r($gendiff_result__formatString);
}
