<?php

### Настройка проекта. namespace. namespace скрипты, модули
namespace Hexlet\Code\Functions\FS;

/**
 * `filesystem(FS)
 * функция (функция с одним процесс-действие, функция простая)
 * Название: Получение путь абс из путь относительно PWD
 * - Путь относительный: ./ или начало без /
 *      преобразовать в абс
 * - Путь абс: возвращается то же значение
 */
function getFilePathnameByPWD(string $pathname): string
{
    if (strpos($pathname, './') === 0) {
        $pathname = $_SERVER['PWD'] . '/' . substr($pathname, 2);
    } elseif (strpos($pathname, '/') !== 0) {
        $pathname = $_SERVER['PWD'] . '/' . $pathname;
    }

    return $pathname;
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
function getFilePathnameMainset(string $pathname): string
{
    $pathname = getFilePathnameByPWD($pathname);

    return $pathname;
}

/**
 * Функция-процессы (функция из несколько процесс-действие)
 * Название: проверка характеристики файлов
 * - существование (вкл)
 * - соответствие структуры формата json (невкл)
 */

function checkFileMainset(string $pathname): bool
{
    if (!file_exists($pathname)) {
        throw new \exception('Error. файл путь: ' . $file1_pathname);
        return false;
    }

    return true;
}
