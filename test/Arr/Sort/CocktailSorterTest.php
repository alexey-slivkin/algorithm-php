<?php

declare(strict_types=1);

namespace App\Test\Arr\Sort;

use App\Arr\Sort\AbstractSorter;
use App\Arr\Sort\CocktailSorter;
use App\Arr\Comparator\ComparatorInterface;

final class CocktailSorterTest extends AbstractSorterTest
{
    function createSorter(ComparatorInterface $comparator): AbstractSorter
    {
        return new CocktailSorter($comparator);
    }
}