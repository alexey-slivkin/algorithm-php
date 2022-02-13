<?php

declare(strict_types=1);

namespace App\Graph\Search;

use App\Graph\Node;
use SplQueue;

/**
 * BFS
 *
 * RU: "поиск в ширину", "поиск кратчайшего расстояния". Неинформированный т.е нет инфы о состоянии. Просто вернет bool.
 */
final class BreadthFirstSearch
{
    public function search(Node $rootNode, Node $destinationNode): bool
    {
        $visited = [];

        $queue = new SplQueue();
        $queue->enqueue($rootNode);

        while (! $queue->isEmpty()) {
            /** @var Node $node */
            $node = $queue->dequeue();

            if (isset($visited[$node->getName()])) {
                continue;
            }

            $visited[$node->getName()] = true;

            if ($node->getName() === $destinationNode->getName()) {
                return true;
            }

            foreach ($node->getChildNodes() as $childNode){
                $queue->enqueue($childNode);
            }
        }

        return false;
    }
}