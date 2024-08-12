<?php

namespace Hexlet\Code\Functions\DataAggregate;

use function Hexlet\Code\Functions\Standard\getListKeys;

function getDiffStatuses()
{
    return ['changes_add' => '+', 'changes_delete' => '-', 'changes_no' => ' '];
}

function tabDiff(string $file1_path, string $file2_path): array
{
    ### Задача. Данные: Получение

    $file1_arr = \json_decode(file_get_contents($file1_path), true);
    $file2_arr = \json_decode(file_get_contents($file2_path), true);

    ### Задача. Вариант-Алгоритм (решение)

    $properties = getListKeys($file1_arr, $file2_arr);
    sort($properties);

    $statuses = getDiffStatuses();

    $properties_diff = [];
    foreach ($properties as $property) {
        if (!isset($file1_arr[$property]) && isset($file2_arr[$property])) {
            $properties_diff[] = [
                "status" => $statuses['changes_add'],
                'name' => $property, 'value' => $file2_arr[$property]
            ];
        }

        if (isset($file1_arr[$property]) && !isset($file2_arr[$property])) {
            $properties_diff[] = [
                "status" => $statuses['changes_delete'],
                'name' => $property, 'value' => $file1_arr[$property]
            ];
        }

        if (isset($file1_arr[$property]) && isset($file2_arr[$property])) {
            if ($file1_arr[$property] === $file2_arr[$property]) {
                $properties_diff[] = [
                    "status" => $statuses['changes_no'],
                    'name' => $property,
                    'value' => $file2_arr[$property]
                ];
            } elseif ($file1_arr[$property] !== $file2_arr[$property]) {
                $properties_diff[] = [
                    "status" => $statuses['changes_delete'],
                    'name' => $property,
                    'value' => $file1_arr[$property]
                ];
                $properties_diff[] = [
                    "status" => $statuses['changes_add'],
                    'name' => $property,
                    'value' => $file2_arr[$property]
                ];
            }
        }
    }

    return $properties_diff;
}
