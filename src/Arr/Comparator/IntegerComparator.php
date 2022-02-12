<?php

declare(strict_types=1);

namespace App\Arr\Comparator;

final class IntegerComparator implements ComparatorInterface
{
    public function compare(mixed $first, mixed $second): int
    {
        return $first <=> $second;
    }

    public function firstGreater(mixed $first, mixed $second): bool
    {
        return $first > $second;
    }

    public function secondGreater(mixed $first, mixed $second): bool
    {
        return $first < $second;
    }

    public function equals(mixed $first, mixed $second): bool
    {
        return $first === $second;
    }
}