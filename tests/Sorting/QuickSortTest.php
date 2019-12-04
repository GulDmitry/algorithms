<?php

namespace GulDmitry\Algorithms\Test\Sorting;

use GulDmitry\Algorithms\Sorting\QuickSort;
use PHPUnit\Framework\TestCase;

class QuickSortTest extends TestCase
{
    public function testSorting()
    {
        $expectedAsc = $shuffled = range(-101, 101);
        asort($expectedAsc);
        shuffle($shuffled);
        $expectedDesc = array_reverse($expectedAsc);

        $alg = new QuickSort();
        $actualAsc = $alg->sort($shuffled);
        $actualDesc = $alg->sort($shuffled, false);

        $this->assertEquals(array_values($expectedAsc), array_values($actualAsc));
        $this->assertEquals(array_values($expectedDesc), array_values($actualDesc));
    }
}
