<?php

declare(strict_types=1);

namespace App\Test\Sort\Arr;

use App\Sort\Arr\AbstractSorter;
use App\Sort\Arr\CocktailSorter;
use App\Sort\Arr\Comparator\ComparatorInterface;

final class CocktailSorterTest extends AbstractSorterTest
{
    function createSorter(ComparatorInterface $comparator): AbstractSorter
    {
        return new CocktailSorter($comparator);
    }
}