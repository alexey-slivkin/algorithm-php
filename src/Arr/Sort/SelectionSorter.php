<?php

declare(strict_types=1);

namespace App\Arr\Sort;

/**
 * RU: сортировка выбором
 */
final class SelectionSorter extends AbstractSorter
{
    /**
     * Complexity: O(n^2)
     */
    public function sort(array $elements): array
    {
        $n = count($elements);

        for ($i = 0; $i < $n; $i++) {
            $indexOfMin = $i;
            //search index of min element in elements[i+1, n]
            for ($j = $i + 1; $j < $n; $j++) {
                if ($this->comparator->secondGreater($elements[$j], $elements[$indexOfMin])) {
                    $indexOfMin = $j;
                }
            }

            $this->swap($elements, $i, $indexOfMin);
        }

        return $elements;
    }
}