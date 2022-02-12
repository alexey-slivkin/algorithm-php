<?php

declare(strict_types=1);

namespace App\Test\Arr\Search;

use App\Arr\Search\BinarySearch;
use PHPUnit\Framework\TestCase;

final class BinarySearchTest extends TestCase
{
    /**
     * @dataProvider casesProvider
     */
    public function testSearch(int $needle, array $haystack, int|null $expectedIndex): void
    {
        $searchService = new BinarySearch();

        $foundIndex = $searchService->search($needle, $haystack);

        self::assertSame($expectedIndex, $foundIndex);
    }

    public function casesProvider(): iterable
    {
        yield 'not found' => [
            'needle'         => 2,
            'haystack'       => [1, 3, 4, 5, 6, 7, 8, 9],
            'expected_index' => null,

        ];

        yield 'not found but empty haystack' => [
            'needle'         => 3,
            'haystack'       => [],
            'expected_index' => null,
        ];

        yield 'found existing element (first)' => [
            'needle'         => 2,
            'haystack'       => [2, 3, 4, 5],
            'expected_index' => 0,
        ];

        yield 'found existing element (last)' => [
            'needle'         => 5,
            'haystack'       => [2, 3, 4, 5],
            'expected_index' => 3,
        ];

        yield 'found existing element (between last and first)' => [
            'needle'         => 4,
            'haystack'       => [2, 3, 4, 5, 8, 9, 19, 20],
            'expected_index' => 2,
        ];
    }
}