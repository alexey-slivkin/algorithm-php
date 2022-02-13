<?php

declare(strict_types=1);

namespace App\Test\Another;

use App\Another\DummyStack;
use OverflowException;
use PHPUnit\Framework\TestCase;


final class DummyStackTest extends TestCase
{
    public function testStack(): void
    {
        $stack = new DummyStack(5);

        $stack->push(10);
        $stack->push(5);

        self::assertSame(5, $stack->pop());

        $stack->push(6);
        self::assertSame(6, $stack->pop());

        self::assertSame(10, $stack->pop());
        self::assertNull($stack->pop());
        self::assertNull($stack->pop());
    }

    public function testStackOverflow(): void
    {
        $stack = new DummyStack(2);

        $stack->push(1);
        $stack->push(2);

        $this->expectException(OverflowException::class);
        $stack->push(3);
    }
}