<?php

declare(strict_types=1);

namespace App\Another;

final class RecursiveMaxFinder
{
    public function max(int|float ... $numbers): float|int|null
    {
        $countNumbers = count($numbers);

        if ($countNumbers === 0) {
            return null;
        }

        if ($countNumbers === 1) {
            return array_pop($numbers);
        }

        if ($countNumbers === 2) {
            return $numbers[0] > $numbers[1] ? $numbers[0] : $numbers[1];
        }

        $last = array_pop($numbers);

        $subMax = $this->max(...$numbers);

        return $last > $subMax ? $last : $subMax;
    }
}