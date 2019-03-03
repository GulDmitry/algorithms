<?php

namespace GulDmitry\Algorithms\Tests\Sorting;

use GulDmitry\Algorithms\Sorting\MergeSort;
use PHPUnit\Framework\TestCase;

class MergeSortTest extends TestCase
{
    public function testSorting(): void
    {
        $expectedAsc = $shuffled = range(-101, 101);
        asort($expectedAsc);
        shuffle($shuffled);
        $expectedDesc = array_reverse($expectedAsc);

        $alg = new MergeSort();
        $actualAsc = $alg->sort($shuffled);
        $actualDesc = $alg->sort($shuffled, false);

        $this->assertEquals(array_values($expectedAsc), array_values($actualAsc));
        $this->assertEquals(array_values($expectedDesc), array_values($actualDesc));
    }
}
