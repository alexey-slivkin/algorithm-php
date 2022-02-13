<?php

declare(strict_types=1);

namespace App\Another;

final class RecursiveCalculator
{
    /**
     * @param array<float|int> $numbers
     * @return float
     */
    public function sum(array $numbers): float
    {
        if ($numbers === []) {
            return 0.0;
        }

        return array_pop($numbers) + $this->sum($numbers);
    }
}