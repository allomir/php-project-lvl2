<?php

### Настройка проекта. namespace. namespace скрипты, модули
namespace Hexlet\Code\Functions\Standard;

## Список 1. Функции. Сортировка, просмотр, представление


/**
 * Название: Получение Список ключи уникальные из всех элементов
 * Алгоритм:
 * - преобразование ключей в значение
 * - слияние значение с помощью цикла, добавление к общей совокупности
 * - удаление повторяющихся значений
 */
function getListKeys(array ...$lists): array
{
    $keys = [];
    foreach ($lists as $list) {
        $keys = [...$keys, ...array_keys($list)];
    }

    return array_unique($keys);
}

/**
 * Название: Получение Список значения уникальные из всех элементов
 * Алгоритм:
 * - слияние значений с помощью цикла, добавление к общей совокупности
 * - удаление повторяющихся значений
 */
function getListValues(array ...$lists): array
{
    $Values = [];
    foreach ($lists as $list) {
        $Values = [...$Values, ...$list];
    }

    return array_unique($Values);
}

function sortTab(array $tab): array
{
    # !TODO. Сортировка по характеристикам $file $name
        # сортировка сделана в getTabDiff с помощью sort() и заполнения в правильном порядке
        # но для точной сортировки сделать сортировать таблицы по характеристикам
        # также позволит сделать другие сортировки
        # выполнить на основе collection()
    return $tab;
}
