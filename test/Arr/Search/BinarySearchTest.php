<?php

declare(strict_types=1);

namespace App\Test\Arr\Search;

use App\Arr\Search\BinarySearch;
use App\Arr\Search\SearchInterface;

final class BinarySearchTest extends AbstractSearchTest
{
    protected function createSearchService(): SearchInterface
    {
        return new BinarySearch();
    }
}