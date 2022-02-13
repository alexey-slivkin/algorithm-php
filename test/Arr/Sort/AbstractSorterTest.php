<?php

declare(strict_types=1);

namespace App\Test\Arr\Sort;

use App\Arr\Sort\AbstractSorter;
use App\Arr\Comparator\ComparatorInterface;
use App\Arr\Comparator\IntegerComparator;
use PHPUnit\Framework\TestCase;

abstract class AbstractSorterTest extends TestCase
{
    abstract function createSorter(ComparatorInterface $comparator): AbstractSorter;

    public function testSortIntegers(): void
    {
        $sorter = $this->createSorter(new IntegerComparator());

        $elements = [6, 0, 4, 9, 22, 0, 2, 3, 1, 4, 5];

        $sortedElements = $sorter->sort($elements);

        self::assertSame(
            implode(',', [0, 0, 1, 2, 3, 4, 4, 5, 6, 9, 22]),
            implode(',', $sortedElements),
        );
    }
}