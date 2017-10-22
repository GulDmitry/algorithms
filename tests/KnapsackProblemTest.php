<?php

namespace GulDmitry\Algorithms\Tests;

use GulDmitry\Algorithms\KnapsackProblem;
use PHPUnit\Framework\TestCase;

class KnapsackProblemTest extends TestCase
{
    public function testCombination()
    {
        $items = [
            'item1' => [
                'size' => 1,
                'price' => 1500,
            ],
            'item2' => [
                'size' => 4,
                'price' => 3000,
            ],
            'item3' => [
                'size' => 3,
                'price' => 2000,
            ],
            'item4' => [
                'size' => 1,
                'price' => 2000,
            ],
        ];
        $capacity = 4;
        $expected = [
            'item2',
            'item4',
        ];

        $alg = new KnapsackProblem();
        $actual = $alg->findCombination($items, $capacity);

        $this->assertEquals($expected, $actual, '', 0.0, 10, true);
    }
}
