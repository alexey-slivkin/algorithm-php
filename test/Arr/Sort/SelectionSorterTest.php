<?php

declare(strict_types=1);

namespace App\Test\Arr\Sort;

use App\Arr\Comparator\ComparatorInterface;
use App\Arr\Sort\AbstractSorter;
use App\Arr\Sort\SelectionSorter;

final class SelectionSorterTest extends AbstractSorterTest
{
    function createSorter(ComparatorInterface $comparator): AbstractSorter
    {
        return new SelectionSorter($comparator);
    }
}