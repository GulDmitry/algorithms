<?php

namespace GulDmitry\Algorithms\Tests;

use GulDmitry\Algorithms\SetCover;
use PHPUnit\Framework\TestCase;

class SetCoverTest extends TestCase
{
    public function testCoverage()
    {
        $statesNeeded = ['mt', 'wa', 'or', 'id', 'nv', 'ut', 'ca', 'az'];
        $stations = [
            'kone' => ['id', 'nv', 'ut'],
            'ktwo' => ['wa', 'id', 'mt'],
            'kthree' => ['or', 'nv', 'ca'],
            'kfour' => ['nv', 'ut'],
            'kfive' => ['ca', 'az'],
        ];
        $expected = [
            'kone',
            'ktwo',
            'kthree',
            'kfive',
        ];

        $alg = new SetCover();
        $actual = $alg->findCoverage($stations, $statesNeeded);

        $this->assertEquals($expected, $actual, '', 0.0, 10, true);
    }
}