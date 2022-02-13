<?php

declare(strict_types=1);

namespace App\Graph;

final class Node
{
    /**
     * @param array<Node> $childNodes
     */
    public function __construct(
        private string $name,
        private array $childNodes = [],
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return array<Node>
     */
    public function getChildNodes(): array
    {
        return $this->childNodes;
    }

    public function addChildNode(Node $node): void
    {
        $this->childNodes[] = $node;
    }
}