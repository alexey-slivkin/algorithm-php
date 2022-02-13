<?php

declare(strict_types=1);

namespace App\Arr\Search;

final class BinaryRecursiveSearch implements SearchInterface
{
    /**
     * Complexity: O(log N)
     */
    public function search(mixed $needle, array $haystack): int|null
    {
        $n = count($haystack);

        if ($n === 0) {
            return null;
        }

        return $this->searchRecursive($needle, $haystack, 0, $n - 1);
    }

    private function searchRecursive(mixed $needle, array $haystack, int $start, int $end): int|null
    {
        $middle = (int)(($start + $end) / 2);
        if ($haystack[$middle] === $needle) {
            return $middle;
        }

        // if last element
        if ($start === $end) {
            return null;
        }

        if ($needle < $haystack[$middle]) {
            $end = $middle - 1;
        } else {
            $start = $middle + 1;
        }

        return $this->searchRecursive($needle, $haystack, $start, $end);
    }
}