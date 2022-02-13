<?php

namespace App\Arr\Search;

interface SearchInterface
{
    public function search(mixed $needle, array $haystack): int|null;
}