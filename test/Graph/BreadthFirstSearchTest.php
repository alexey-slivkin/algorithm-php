<?php

declare(strict_types=1);

namespace App\Test\Graph;

use App\Graph\Node;
use App\Graph\Search\BreadthFirstSearch;
use PHPUnit\Framework\TestCase;

final class BreadthFirstSearchTest extends TestCase
{
    public function testBFS(): void
    {
        $bfs = new BreadthFirstSearch();

        /**
         * A ---> B ---> D
         *   \    ^
         *    \   |______
         *     \         \
         *      `> C ---> E ---> K
         */

        $a = new Node('A');
        $b = new Node('B');
        $c = new Node('C');
        $d = new Node('D');
        $e = new Node('E');
        $k = new Node('K');

        $a->addChildNode($b);
        $a->addChildNode($c);

        $b->addChildNode($d);

        $c->addChildNode($e);

        $e->addChildNode($k);
        $e->addChildNode($b);

        self::assertFalse($bfs->search($b, $c));
        self::assertFalse($bfs->search($d, $a));
        self::assertFalse($bfs->search($k, $b));

        self::assertTrue($bfs->search($e, $d));
        self::assertTrue($bfs->search($a, $d));
        self::assertTrue($bfs->search($a, $e));
    }
}