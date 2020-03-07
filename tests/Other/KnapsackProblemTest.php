<?php

namespace GulDmitry\Algorithms\Test\Other;

use GulDmitry\Algorithms\Other\KnapsackProblem;
use PHPUnit\Framework\TestCase;

class KnapsackProblemTest extends TestCase
{
    public function testCombination()
    {
        $items = [
            'item1' => [
                'size' => 4,
                'price' => 3000,
            ],
            'item2' => [
                'size' => 1,
                'price' => 1500,
            ],
            'item3' => [
                'size' => 3,
                'price' => 2000,
            ],
            'item4' => [
                'size' => 1,
                'price' => 2000,
            ],
            'item5' => [
                'size' => 2,
                'price' => 1000,
            ],
        ];
        $capacity = 4;
        $expected = [
            'item2',
            'item4',
            'item5',
        ];

        $alg = new KnapsackProblem();
        $actual = $alg->findCombination($items, $capacity);

        $this->assertEqualsCanonicalizing($expected, $actual);
    }
}
