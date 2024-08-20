<?php

namespace Hexlet\Code\Functions\DataTextFormats;

/**
 * функция открыть (чтения, read) файл для получения данные скалярные
 *      функция чтения FS зависит от вида файла и программы открытия
 *      программы чтения скалярных данных (dataText)
 *      file - хранение данных в FS, уровень выше вида данных dataText
 *      dataText - виды скалярные структуры (json, yaml, string)
 */
function readFile__dataText($pathname)
{
    return file_get_contents($pathname, true);
}
/**
 * функция представление-формат
 * $datajson - вид $dataText (скалярные данные текстовые)
 */
function encodeDatajsonToDataarr($datajson)
{
    return json_decode($datajson, true);
}

/**
 * `formats
 * функция-лямбда и функция простая
 * Название: преобразование структуры массив свойства-значения в структуру строка
 * $dataarr
 *      массив данных, с помощью функция-лямбда можно определить представление
 * arg $brackets
 *      внешние скобки
 *      - [] все скобки
 *      - {} все скобки
 * $string__style:
 *      функция-лямбда
 *      return '' . implode(' : ', $item) . '';
 *      return '' . $item['status'] . ' ' . $item['name'] . ': ' . $item['value'] . '';
 */
function encodeDataarrToString(array $dataarr, string $brackets = '', $string__style = null)
{
    $items = encodeBoolToString__dataarr($dataarr);

    $result = '';
    foreach ($items as $item) {
        if ($string__style === null) {
            $item = '' . implode(' : ', $item) . '';
        } else {
            $item = $string__style($item);
        }

        $result .= "$item" . "\n";
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
function encodeBoolToString__dataarr($dataarr)
{
    if (is_array($dataarr)) {
        $arr = array_map(function ($value) {
            return encodeBoolToString__dataarr($value);
        }, $dataarr);

        return $arr;
    }

    if (is_bool($dataarr)) {
        return encodeBoolToString($dataarr);
    }

    return $dataarr;
}
