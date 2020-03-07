<?php

namespace GulDmitry\Algorithms\Test\Other;

use GulDmitry\Algorithms\Other\SetCover;
use PHPUnit\Framework\TestCase;

class SetCoverTest extends TestCase
{
    public function testCoverage()
    {
        $statesNeeded = ['mt', 'wa', 'or', 'id', 'nv', 'ut', 'ca', 'az'];
        $stations = [
            'kone' => ['id', 'nv', 'ut', 'ca'],
            'ktwo' => ['wa', 'id', 'mt'],
            'kthree' => ['or', 'nv', 'ca'],
            'kfour' => ['nv', 'ut'],
            'kfive' => ['az'],
        ];
        $expected = [
            'kone',
            'ktwo',
            'kthree',
            'kfive',
        ];

        $alg = new SetCover();
        $actual = $alg->findCoverage($stations, $statesNeeded);

        $this->assertEqualsCanonicalizing($expected, $actual);
    }
}
