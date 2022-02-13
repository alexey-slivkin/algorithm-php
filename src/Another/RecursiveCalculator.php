<?php

declare(strict_types=1);

namespace App\Another;

final class RecursiveCalculator
{
    public function sum(int|float ... $numbers): float
    {
        if ($numbers === []) {
            return 0.0;
        }

        return array_pop($numbers) + $this->sum(...$numbers);
    }
}