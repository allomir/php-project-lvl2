<?php

namespace Hexlet\Code\gendiff;

### Настройка проекта. namespace. настройка Composer autoload. список загрузки
use function Hexlet\Code\Functions\DataTextFormats\readFile__dataText;
use function Hexlet\Code\Functions\DataTextFormats\encodeDatajsonToDataarr;
use function Hexlet\Code\Functions\DataTextFormats\encodeDataarrToString;
use function Hexlet\Code\Functions\DataAggregate\gendiff__dataarr;
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

    ### Задача-часть. Данные скалярные форматирование в php dataarr
        // $format = $format ?? 'stylish'; // разрабатывается далее
    $files_extendedData = [];

    if ($files[0]['extension'] === 'json') {
        foreach ($files as $file) {
            $file['datajson'] = readFile__dataText($file['pathname']);
            $file['dataarr'] = encodeDatajsonToDataarr($file['datajson']);
            $files_extendedData[] = $file;
        }
    }

    $files = $files_extendedData;

    ### Задача-часть. Данные обработка: сравнение характеристик (обработка, diff) структуры данных
    // Результат (данные исходящие): формат arr
    $file1 = $files[0];
    $file2 = $files[1];

    $result__dataarr = gendiff__dataarr($file1['dataarr'], $file2['dataarr']);

    ### Задача-часть. Данные форматирование: формат dataarr-strings
    $result__strings = encodeDataarrToString(
        $dataarr = $result__dataarr,
        $brackets = '{}',
        $string__style = function ($item) {
            return $item['status'] . ' ' . $item['name'] . ': ' . $item['value'];
        }
    );

    ### Задача-часть. Данные просмотр: просмотр strings
    print_r($result__strings);
}
