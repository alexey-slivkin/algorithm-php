<?php

declare(strict_types=1);

namespace App\Test\Another;

use App\Another\RecursiveCalculator;
use PHPUnit\Framework\TestCase;

final class RecursiveCalculatorTest extends TestCase
{
    public function testCalculateSum(): void
    {
        $calculator = new RecursiveCalculator();


        $sum = $calculator->sum(1, 2, 3.3, 5, 4.2);

        self::assertSame(15.5, $sum);
    }
}