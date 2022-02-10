<?php

declare(strict_types=1);

namespace App\Test\Sort\Arr;

use App\Sort\Arr\BubbleSorter;
use App\Sort\Arr\Comparator\IntegerComparator;
use PHPUnit\Framework\TestCase;

final class BubbleSorterTest extends TestCase
{
    public function testSortIntegers(): void
    {
        $bubbleSorter = new BubbleSorter(
            new IntegerComparator(),
        );

        $elements = [6, 0, 4, 9, 22, 0, 2, 3, 1, 4, 5];

        $sortedElements = $bubbleSorter->sort($elements);

        self::assertSame(
            [0, 0, 1, 2, 3, 4, 4, 5, 6, 9, 22],
            $sortedElements,
        );
    }
}