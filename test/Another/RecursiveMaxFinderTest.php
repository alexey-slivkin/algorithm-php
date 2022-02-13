<?php

declare(strict_types=1);

namespace App\Test\Another;

use App\Another\RecursiveMaxFinder;
use PHPUnit\Framework\TestCase;

final class RecursiveMaxFinderTest extends TestCase
{
    public function testCalculateSum(): void
    {
        $calculator = new RecursiveMaxFinder();


        $max = $calculator->max(-1, -2, 5, 0, 9, -10, 22, 3, 0, 1);

        self::assertSame(22, $max);
    }
}