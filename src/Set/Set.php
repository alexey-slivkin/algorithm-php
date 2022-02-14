<?php

declare(strict_types=1);

namespace App\Set;

use Countable;

final class Set implements Countable
{
    private function __construct(
        private string $name,
        private array $elements,
    ) {
    }

    public static function fromArray(string $name, array $array = []): self
    {
        return new self($name, array_unique($array));
    }

    public function intersect(Set $set): Set
    {
        return new self(
            'intersect',
            array_intersect($this->getElements(), $set->getElements())
        );
    }

    public function diff(Set $set): Set
    {
        return new self(
            'diff',
            array_diff($this->getElements(), $set->getElements())
        );
    }

    public function belong(mixed $element): bool
    {
        return in_array($element, $this->getElements(), true);
    }

    public function add(mixed $element): void
    {
        if (!$this->belong($element)) {
            $this->elements[] = $element;
        }
    }

    public function count(): int
    {
        return count($this->elements);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getElements(): array
    {
        return $this->elements;
    }
}