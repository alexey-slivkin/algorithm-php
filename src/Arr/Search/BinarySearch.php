<?php

declare(strict_types=1);

namespace App\Arr\Search;

final class BinarySearch implements SearchInterface
{
    /**
     * Complexity: O(log N)
     */
    public function search(mixed $needle, array $haystack): int|null
    {
        $start = 0;
        $end   = count($haystack) - 1;

        while ($start <= $end) {
            $middle = (int)(($start + $end) / 2);

            $current = $haystack[$middle];

            if ($current === $needle) {
                return $middle;
            }

            if ($needle < $current) {
                $end = $middle - 1;
            } else {
                $start = $middle + 1;
            }
        }

        return null;
    }
}