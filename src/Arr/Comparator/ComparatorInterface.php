<?php

declare(strict_types=1);

namespace App\Arr\Comparator;

interface ComparatorInterface
{
    public const LESS    = -1;
    public const GREATER = 1;
    public const EQUALS  = 0;

    /**
     * @return int
     *              0 if [first == second (equals)];
     *             -1 if [first < second];
     *              1 if [first > second]
     */
    public function compare(mixed $first, mixed $second): int;

    public function firstGreater(mixed $first, mixed $second): bool;

    public function secondGreater(mixed $first, mixed $second): bool;

    public function equals(mixed $first, mixed $second): bool;
}