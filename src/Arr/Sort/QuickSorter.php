<?php

declare(strict_types=1);

namespace App\Arr\Sort;

final class QuickSorter extends AbstractSorter
{
    /**
     * RU: быстрая сортировка
     * Complexity: avg - O(N*logN); max: O(N^2)
     */
    public function sort(array $elements): array
    {
        $n = count($elements);

        // base case
        if ($n < 2) {
            return $elements;
        }

        // RU: опорный элемент
        $pivotKey = random_int(0, $n - 1);
        $pivot    = $elements[$pivotKey];
        // modified. Original not array

        $pivots  = [];
        $less    = [];
        $greater = [];
        foreach ($elements as $element) {
            switch ($this->comparator->compare($element, $pivot)) {
                case $this->comparator::LESS:
                    $less[] = $element;
                    break;
                case $this->comparator::GREATER:
                    $greater[] = $element;
                    break;
                default:
                    $pivots[] = $pivot;
            }
        }

        return array_merge($this->sort($less), $pivots, $this->sort($greater));
    }
}