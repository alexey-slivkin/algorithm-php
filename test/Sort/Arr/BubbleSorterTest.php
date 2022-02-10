<?php

declare(strict_types=1);

namespace App\Test\Sort\Arr;

use App\Sort\Arr\AbstractSorter;
use App\Sort\Arr\BubbleSorter;
use App\Sort\Arr\Comparator\ComparatorInterface;
use PHPUnit\Framework\TestCase;

final class BubbleSorterTest extends AbstractSorterTest
{
    function createSorter(ComparatorInterface $comparator): AbstractSorter
    {
        return new BubbleSorter($comparator);
    }
}