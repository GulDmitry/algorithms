<?php

namespace GulDmitry\Algorithms\Tests\Sorting;

use GulDmitry\Algorithms\Sorting\BubbleSort;
use PHPUnit\Framework\TestCase;

class BubbleSortTest extends TestCase
{
    /**
     * Has `0`, negative keys and values, duplicates.
     */
    public function testSorting()
    {
        $expectedAsc = $shuffled = range(-101, 101) + [-1 => 1];
        asort($expectedAsc);
        shuffle($shuffled);
        $expectedDesc = array_reverse($expectedAsc);

        $alg = new BubbleSort();
        $actualAsc = $alg->sort($shuffled);
        $actualDesc = $alg->sort($shuffled, false);

        $this->assertEquals(array_values($expectedAsc), array_values($actualAsc));
        $this->assertEquals(array_values($expectedDesc), array_values($actualDesc));
    }
}
