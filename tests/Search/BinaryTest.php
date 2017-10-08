<?php

namespace GulDmitry\Algorithms\Tests\Search;

use GulDmitry\Algorithms\Search\Binary;
use PHPUnit\Framework\TestCase;

class BinaryTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @param array $searchIn
     * @param int $num
     * @param int|null $expectedPosition
     */
    public function testSearching(array $searchIn, int $num, ?int $expectedPosition)
    {
        $alg = new Binary();

        $actualPosition = $alg->search($searchIn, $num);

        $this->assertEquals($expectedPosition, $actualPosition);
    }

    public function dataProvider()
    {
        $range = range(-101, 101);

        yield [$range, 0, 101];
        yield [$range, -100, 1];
        yield [$range, 1, 102];
        yield [$range, 101, 202];
        yield [$range, 999, null];
        yield [[-22 => 1, 0 => 2, 99 => 3], 2, 1];
        yield [[1, 2, 1], 1, 1];
    }
}
