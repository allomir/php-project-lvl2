<?php

### Настройка проекта. namespace. namespace скрипты, модули
namespace Hexlet\Code\Functions\FS;

/**
 * функция свойства файла
 * - путь абс
 * - имя
 * - расширение
 * - размер файла
 * Кроме:
 * - стуркутура (Format)
 *      работа со структурой выполняется в программах отдельных
 *      работа с текстовые файлы (Text) выполняют функции DataFormats
 */
function setFileModel($pathname)
{
    $characteristics = [
        'pathname' => $pathname,
        'name' => pathinfo($pathname)['basename'],
        'extension' => pathinfo($pathname)['extension'],
            // kind by Extention into a name
            // для определения вида по структуре необходимо анализ код или подбор программы
    ];

    return $characteristics;
}

/**
 * функция проверка-разрешение Файл характеристика расширение
 * - $settingExtensions: настройка модуля разрешенные расширения
 * - $fileExtension: только расширение, не указывается название файла в exception
 */
function permitFileExtension(array $settingExtensions, string $fileExtension): bool
{
    if (!in_array($fileExtension, $settingExtensions)) {
        return false;
    }

    return true;
}

/**
 * функция проверка-разрешение Файл характеристика расширение
 * Предназначение: настройка программы данные пограничные условия
 * - $settingExtensions: настройка модуля разрешенные расширения
 * - $file: все характеристики
 *      - расширение
 *      - название
 */
function permitFileExtension__model(array $settingExtensions, array $file)
{
    $fileExtension = $file['extension'];
    $fileName = $file['name'];

    if (!permitFileExtension($settingExtensions, $fileExtension)) {
        throw new \exception(
            'Файл расширение: проверка-разрешение. Error: ' . $fileName
        );
    }

    return true;
}

/**
 * Функция-выбор (функция из несколько функций)
 * Название: поиск файлов в несколько путей
 *      основное использование для проекта, возможно доработка путей
 * - Путь Относительно PWD (вкл, основное)
 *      запуск в месте хранения файлы для обработки
 *      удобно для пользователя
 * - Путь Относительно project (невкл)
 *      возможна доработка
 */
function getFilePathnameSet(string $pathname): string
{
    $pathname__abs = getFilePathname__PWD($pathname);

    return $pathname;
}

/**
 * `filesystem(FS)
 * функция (функция с одним процесс-действие, функция простая)
 * Название: Получение путь абс из путь относительно PWD
 * - Путь относительный: ./ или начало без /
 *      преобразовать в абс
 * - Путь абс: возвращается то же значение
 */
function getFilePathname__PWD(string $pathname): string
{
    $pathname__abs = $pathname;

    if (strpos($pathname, './') === 0) {
        $pathname__abs = $_SERVER['PWD'] . '/' . substr($pathname, 2);
    } elseif (strpos($pathname, '/') !== 0) {
        $pathname__abs = $_SERVER['PWD'] . '/' . $pathname;
    }

    return $pathname__abs;
}

/**
 * Функция-процессы (функция из несколько процесс-действие)
 * Название: проверка характеристики файлов
 * - существование (вкл)
 */
function checkFile__Pathname(string $pathname): bool
{
    if (!file_exists($pathname)) {
        return false;
    }

    return true;
}

/**
 * Функция-процессы (функция из несколько процесс-действие)
 * Название: проверка характеристики файлов
 * - существование (вкл)
 * - соответствие структуры формата json (невкл)
 */
function checkFile__model(array $file): bool
{
    $filPathname = $file['pathname'];
    $fileName = $file['name'];

    if (!file_exists($filPathname)) {
        throw new \exception(
            'Файл путь: проверка. Error: ' . $fileName
        );
    }

    return true;
}
