<?php

### Настройка проекта. namespace. namespace скрипты, модули
namespace Hexlet\Code\Functions\Standard;

## Список 1. Функции. Стандартные. Данные, виды: разные, Данные, действия: разные

/**
 * Название: Список характеристики уникальные из всех элементов
 * Алгоритм:
 * - цикл слияние характеристик в новый список от первого до последнего элементов 
 */
function getListPropertiesFromListIDs(array ...$listIDs): array
{
    $properties = [];
    foreach($listIDs as $list) {
        $properties = [...$properties, ...array_keys($list)];
    }

    return array_unique($properties);
}

function getListProperties(array ...$lists): array
{
    $properties = [];
    foreach($lists as $list) {
        $properties = [...$properties, ...$list];
    }

    return array_unique($properties);
}

function formatListIDToTab(array $listID) {
    $propertyNew = [];
}

function getStatuses()
{
    return ['changes_add' => '+', 'changes_delete' => '-', 'changes_no' => ' '];
}

### Название: Сравнение множество свойства
/**
 * Название: таблица элементы-свойства
 * Алгоритм:
 * - функция список свойства
 * - функция список статусы
 * - tab свойства new относительно std (сравнение)
 * - свойства удаленные в std - хранение как свойства в new со статусом delete
 * - свойства с разными значениями в new и std - хранение обоих со статусами delete и add
 * - сортировка по названию свойства ksort
 */
function getTabDiff(array $list_std, array $list_new): array
{
    $properties = getListPropertiesFromListIDs($list_std, $list_new);
    sort($properties);

    $statuses = getStatuses();

    $properties_diff = [];
    foreach($properties as $property) {

        if (!isset($list_std[$property]) && isset($list_new[$property])) {
            $properties_diff[] = ["status" => $statuses['changes_add'], 'name' => $property, 'value' => $list_new[$property]];
        }

        if (isset($list_std[$property]) && !isset($list_new[$property])) {
            $properties_diff[] = ["status" => $statuses['changes_delete'], 'name' => $property, 'value' => $list_std[$property]];
        }

        if (isset($list_std[$property]) && isset($list_new[$property])) {
            if($list_std[$property] === $list_new[$property]) {
                $properties_diff[] = ["status" => $statuses['changes_no'], 'name' => $property, 'value' => $list_new[$property]];
            } elseif ($list_std[$property] !== $list_new[$property]) {
                $properties_diff[] = ["status" => $statuses['changes_delete'], 'name' => $property, 'value' => $list_std[$property]];
                $properties_diff[] = ["status" => $statuses['changes_add'], 'name' => $property, 'value' => $list_new[$property]];
            }
        }
    }

    return $properties_diff;
}

function encodeTabToString(array $arr_real, string $settingGlue = ' ', string $settingBkt = '', string $settingRowFormat = ''): string
{
    $arr = encodeBoolToString__tab($arr_real);

    $result = '';
    foreach ($arr as $row_arr) {
        $row = '';
        switch ($settingRowFormat) {
            case 'gendiff':
                $row = $row_arr['status'] . ' ' . $row_arr['name'] . ': ' . $row_arr['value'];
                break;
            default:
                $row = implode($settingGlue, $row_arr);
                break;
        }

        switch ($settingBkt) {
            case '[rows]':
                $row = '[' . $row . ']';
                break;
            case '{rows}':
                $row = '{' . $row . '}';
                break;
            }

        $result .= "$row" . "\n";
    }

    switch ($settingBkt) {
        case '[]':
        case '[rows]':
            $result = '[' . "\n" . $result . ']';
            break;
        case '{}':
        case '{rows}':
            $result = '{' . "\n" . $result . '}';
            break;
        }

    return $result;
}

function encodeTabToString__gendiff(array $arr_real): string
{
    return encodeTabToString($arr_real, ' ', '{}', 'gendiff');
}

function encodeBoolToString(bool $bool_real): string
{
    $arr_bools = [
        false => 'false',
        true => 'true',
    ];

    return $arr_bools[$bool_real];
}

function encodeBoolToString__tab($var_real)
{
    if (is_bool($var_real)) {
        return encodeBoolToString($var_real);
    }

    if (is_array($var_real)) {
        $arr = array_map(function ($value) {
            return encodeBoolToString__tab($value);
        }, $var_real);

        return $arr;
    }

    return $var_real;
}



