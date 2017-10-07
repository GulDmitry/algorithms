<?php

namespace GulDmitry\Algorithms\Tests;

use GulDmitry\Algorithms\Fibonacci;
use PHPUnit\Framework\TestCase;

class FibonacciTest extends TestCase
{
    public function testSequence()
    {
        $expected = [0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144];

        $alg = new Fibonacci();
        $actualSimple = $alg->generateSimple(count($expected));
        $actualMath = $alg->generateMath(count($expected));

        $this->assertEquals($expected, $actualSimple);
        $this->assertEquals($expected, $actualMath);
    }
}
