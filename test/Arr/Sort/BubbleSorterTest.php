<?php

declare(strict_types=1);

namespace App\Test\Arr\Sort;

use App\Arr\Sort\AbstractSorter;
use App\Arr\Sort\BubbleSorter;
use App\Arr\Comparator\ComparatorInterface;

final class BubbleSorterTest extends AbstractSorterTest
{
    function createSorter(ComparatorInterface $comparator): AbstractSorter
    {
        return new BubbleSorter($comparator);
    }
}