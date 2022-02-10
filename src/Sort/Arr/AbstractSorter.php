<?php

declare(strict_types=1);

namespace App\Sort\Arr;

use App\Sort\Arr\Comparator\ComparatorInterface;

abstract class AbstractSorter
{
    public function __construct(
        protected ComparatorInterface $comparator,
    ) {
    }

    abstract function sort(array $elements): array;
}