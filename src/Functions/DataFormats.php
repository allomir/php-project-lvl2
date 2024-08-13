<?php

namespace Hexlet\Code\Functions\DataFormats;

/**
 * `структуры (представление) данных
 * Функция-выбор (набор)
 * Название: Выбор формата-структуры
 *
 */
function selectorEncodeTabArrToFormat(array $tabArr, string $format = 'string', string $brackets = '', $funcItem = null)
{
    switch ($format) {
        case 'text':
        case 'string':
            $result = encodeTabArrToString($tabArr, $brackets, $funcItem);
            break;
        case 'json':
            $result = json_encode($tabArr);
            break;
        default:
            $result = $tabArr;
            break;
    }

    return $result;
}

/**
 * `formats
 * функция-лямбда и функция простая
 * Название: преобразование структуры массив свойства-значения в структуру строка
 * $tabArr
 *      массив данных, с помощью функция-лямбда можно определить представление
 * arg $brackets
 *      внешние скобки
 *      - [] все скобки
 *      - {} все скобки
 * $funcItem:
 *      функция-лямбда
 *      return '' . implode(' : ', $item) . '';
 *      return '' . $item['status'] . ' ' . $item['name'] . ': ' . $item['value'] . '';
 */
function encodeTabArrToString(array $tabArr, string $brackets = '', $funcItem = null)
{
    $items = encodeBoolToString__tabArr($tabArr);

    $result = '';
    foreach ($items as $item) {
        if ($funcItem === null) {
            $item__string = '' . implode(' : ', $item) . '';
        } else {
            $item__string = $funcItem($item);
        }

        $result .= "$item__string" . "\n";
    }

    switch ($brackets) {
        case '[]':
            $result = "[\n" . $result . "]\n";
            break;
        case '{}':
            $result = "{\n" . $result . "}\n";
            break;
        default:
            $result = "\n" . $result . "\n";
            break;
    }

    return $result;
}


/**
 * Формат-представление данных булевых ввиде текста
 * null всегда как '' пустая строка
 */
function encodeBoolToString(bool $bool): string
{
    $arr_bools = [
        false => 'false',
        true => 'true',
    ];

    return $arr_bools[$bool];
}

/**
 * Рекурсивная функция
 * Формат-представление данных булевых ввиде текста в структурах строка или массив
 * null всегда как '' пустая строка
 * Возвращает и принимает mix строки и массивы
 */
function encodeBoolToString__tabArr($tabArr)
{
    if (is_array($tabArr)) {
        $arr = array_map(function ($value) {
            return encodeBoolToString__tabArr($value);
        }, $tabArr);

        return $arr;
    }

    if (is_bool($tabArr)) {
        return encodeBoolToString($tabArr);
    }

    return $tabArr;
}
