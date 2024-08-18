<?php

namespace Hexlet\Code\gendiff;

### Настройка проекта. namespace. настройка Composer autoload. список загрузки
use function Hexlet\Code\Functions\DataTextFormats\selectorEncodeTabArrToFormat;
use function Hexlet\Code\Functions\DataAggregate\gendiff__DataArr;
use function Hexlet\Code\Functions\FS\setFileModel;
use function Hexlet\Code\Functions\FS\getFilePathnameSet;
use function Hexlet\Code\Functions\FS\checkFile__model;
use function Hexlet\Code\Functions\FS\permitFileExtension__model;

/**
 * Функция-скрипт (функция-скрипт, функция-проект, модуль)
 * Структура подобие скрипт:
 * - Аргументы как у скрипта, определяют внутренние опции
 * - кроме выполнения, те не содержит Composer autoload подключение
 * - кроме docopt
 * - кроме Характеристики проект-задача, входящие данные FS: процесс-получение
 */
function gendiff($file1Pathname, $file2Pathname, $format = 'string')
{
    ### Задача-часть. Модуль характеристики (Настройка)
    $settingExtensions = ['yaml', 'yml', 'json'];
    $settingFormat = ['string'];

    ### Задача-часть. Данные-модель характеристики (сущности-модели)
        // - характеристики Путь абс: получение
        // - создание моделей с характеристиками
    $filesPathname = [$file1Pathname, $file2Pathname];
    $files = array_map(function ($pathname) {
        $filePathname__abs = getFilePathnameSet($pathname);

        return setFileModel($filePathname__abs);
    }, $filesPathname);

    ### Задача-часть. Данные: процесс-проверка FS
    array_map(function ($file) {
        checkFile__model($file);

        return $file;
    }, $files);

    ### Задача-часть. Модуль характеристики: проверка-разрешение расширение файла
    array_map(function ($file) use ($settingExtensions) {
        permitFileExtension__model($settingExtensions, $file);

        return $file;
    }, $files);

    ### Задача-часть. Данные обработка: сравнение характеристик (обработка, diff) структуры данных
    // $format = $format ?? 'stylish'; // разрабатывается далее
    // Результат (данные исходящие): формат arr

    $file1Pathname = $files['0']['pathname'];
    $data1__Arr = \json_decode(file_get_contents($file1Pathname), true);
    $file2Pathname = $files['1']['pathname'];
    $data2__Arr = \json_decode(file_get_contents($file2Pathname), true);

    $gendiff_result = gendiff__DataArr($data1__Arr, $data2__Arr);

    ### Задача-часть. Данные обработка: формат strings
    $gendiff_result__formatString = selectorEncodeTabArrToFormat(
        $tabArr = $gendiff_result,
        $format = 'string',
        $brackets = '{}',
        $funcItem = function ($item) {
            return $item['status'] . ' ' . $item['name'] . ': ' . $item['value'];
        }
    );

    ### Задача-часть. Данные хранение-просмотр: просмотр strings
    print_r($gendiff_result__formatString);
}
