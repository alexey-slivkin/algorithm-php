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

    public function testSortIntegersDesc(): void
    {
        $invertedComparator = new class () implements ComparatorInterface {
            private ComparatorInterface $decorated;

            public function __construct()
            {
                $this->decorated = new IntegerComparator();
            }

            public function compare(mixed $first, mixed $second): int
            {
                return $this->decorated->compare($second, $first);
            }

            public function firstGreater(mixed $first, mixed $second): bool
            {
                return $this->decorated->firstGreater($second, $first);
            }

            public function secondGreater(mixed $first, mixed $second): bool
            {
                return $this->decorated->secondGreater($second, $first);
            }

            public function equals(mixed $first, mixed $second): bool
            {
                return $this->decorated->equals($first, $second);
            }
        };

        $sorter = $this->createSorter($invertedComparator);

        $elements = [6, 0, 4, 9, 22, 0, 2, 3, 1, 4, 5];

        $sortedElements = $sorter->sort($elements);

        self::assertSame(
            implode(',', [22, 9, 6, 5, 4, 4, 3, 2, 1, 0, 0]),
            implode(',', $sortedElements),
        );
    }
}