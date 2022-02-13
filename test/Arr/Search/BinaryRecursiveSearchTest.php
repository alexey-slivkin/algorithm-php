<?php

declare(strict_types=1);

namespace App\Test\Arr\Search;

use App\Arr\Search\BinaryRecursiveSearch;
use App\Arr\Search\SearchInterface;

final class BinaryRecursiveSearchTest extends AbstractSearchTest
{
    protected function createSearchService(): SearchInterface
    {
        return new BinaryRecursiveSearch();
    }
}