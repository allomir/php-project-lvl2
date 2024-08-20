<?php

namespace Hexlet\Code\Functions\DataAggregate;

use function Hexlet\Code\Functions\Standard\getListKeys;

function gendiffSettingStatuses()
{
    return ['changes_add' => '+', 'changes_delete' => '-', 'changes_no' => ' '];
}

function gendiff__dataarr(array $dataarr1, array $dataarr2): array
{

    ### Задача. Вариант-Алгоритм (решение)
    $properties = getListKeys($dataarr1, $dataarr2);
    sort($properties);

    $statuses = gendiffSettingStatuses();

    $properties_diff = [];
    foreach ($properties as $property) {
        if (!isset($dataarr1[$property]) && isset($dataarr2[$property])) {
            $properties_diff[] = [
                "status" => $statuses['changes_add'],
                'name' => $property, 'value' => $dataarr2[$property]
            ];
        }

        if (isset($dataarr1[$property]) && !isset($dataarr2[$property])) {
            $properties_diff[] = [
                "status" => $statuses['changes_delete'],
                'name' => $property, 'value' => $dataarr1[$property]
            ];
        }

        if (isset($dataarr1[$property]) && isset($dataarr2[$property])) {
            if ($dataarr1[$property] === $dataarr2[$property]) {
                $properties_diff[] = [
                    "status" => $statuses['changes_no'],
                    'name' => $property,
                    'value' => $dataarr2[$property]
                ];
            } elseif ($dataarr1[$property] !== $dataarr2[$property]) {
                $properties_diff[] = [
                    "status" => $statuses['changes_delete'],
                    'name' => $property,
                    'value' => $dataarr1[$property]
                ];
                $properties_diff[] = [
                    "status" => $statuses['changes_add'],
                    'name' => $property,
                    'value' => $dataarr2[$property]
                ];
            }
        }
    }

    return $properties_diff;
}
