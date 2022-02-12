<?php

declare(strict_types=1);

namespace App\Arr\Sort;

use App\Arr\Comparator\ComparatorInterface;

abstract class AbstractSorter
{
    public function __construct(
        protected ComparatorInterface $comparator,
    ) {
    }

    abstract public function sort(array $elements): array;

    protected function swap(array &$elements, int $i, int $j): void
    {
        [$elements[$i], $elements[$j]] = [$elements[$j], $elements[$i]];
    }
}