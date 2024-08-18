<?php

namespace Hexlet\Code\Functions\DataAggregate;

use function Hexlet\Code\Functions\Standard\getListKeys;

function gendiffSettingStatuses()
{
    return ['changes_add' => '+', 'changes_delete' => '-', 'changes_no' => ' '];
}

function gendiff__DataArr(array $data1__Arr, array $data2__Arr): array
{

    ### Задача. Вариант-Алгоритм (решение)

    $properties = getListKeys($data1__Arr, $data2__Arr);
    sort($properties);

    $statuses = gendiffSettingStatuses();

    $properties_diff = [];
    foreach ($properties as $property) {
        if (!isset($data1__Arr[$property]) && isset($data2__Arr[$property])) {
            $properties_diff[] = [
                "status" => $statuses['changes_add'],
                'name' => $property, 'value' => $data2__Arr[$property]
            ];
        }

        if (isset($data1__Arr[$property]) && !isset($data2__Arr[$property])) {
            $properties_diff[] = [
                "status" => $statuses['changes_delete'],
                'name' => $property, 'value' => $data1__Arr[$property]
            ];
        }

        if (isset($data1__Arr[$property]) && isset($data2__Arr[$property])) {
            if ($data1__Arr[$property] === $data2__Arr[$property]) {
                $properties_diff[] = [
                    "status" => $statuses['changes_no'],
                    'name' => $property,
                    'value' => $data2__Arr[$property]
                ];
            } elseif ($data1__Arr[$property] !== $data2__Arr[$property]) {
                $properties_diff[] = [
                    "status" => $statuses['changes_delete'],
                    'name' => $property,
                    'value' => $data1__Arr[$property]
                ];
                $properties_diff[] = [
                    "status" => $statuses['changes_add'],
                    'name' => $property,
                    'value' => $data2__Arr[$property]
                ];
            }
        }
    }

    return $properties_diff;
}
