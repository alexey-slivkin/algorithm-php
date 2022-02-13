<?php

declare(strict_types=1);

namespace App\Another;

use OverflowException;

final class DummyStack
{
    private array $values = [];

    public function __construct(
        private int $size,
    ) {
    }

    public function push(mixed $value): void
    {
        if (count($this->values) >= $this->size) {
            throw new OverflowException('Stack overflow. Max: ' . $this->size);
        }

        $this->values[] = $value;
    }

    public function pop(): mixed
    {
        return array_pop($this->values);
    }
}