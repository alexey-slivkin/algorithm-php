<?php

declare(strict_types=1);

namespace App\Sort\Arr;

final class BubbleSorter extends AbstractSorter
{
    /**
     * Complexity: O(n^2)
     */
    function sort(array $elements): array
    {
        $n = count($elements);

        $isSorted = false;
        while (!$isSorted) {
            $isSorted = true;
            for ($i = 0; $i < $n - 1; $i++) {
                $j = $i + 1;
                if ($this->comparator->firstGreater($elements[$i], $elements[$j])) {
                    $isSorted = false;
                    // swap
                    [$elements[$i], $elements[$j]] = [$elements[$j], $elements[$i]];
                }
            }
        }

        return $elements;
    }
}