<?php

namespace GulDmitry\Algorithms\Tests\Search;

use GulDmitry\Algorithms\Search\Dijkstras;
use PHPUnit\Framework\TestCase;

class DijkstrasTest extends TestCase
{
    public function testSearch()
    {
        $graph = [];
        $graph['start'] = [];
        $graph['start']['a'] = 6;
        $graph['start']['b'] = 2;
        $graph['a'] = [];
        $graph['a']['fin'] = 1;
        $graph['b'] = [];
        $graph['b']['a'] = 3;
        $graph['b']['fin'] = 5;
        $graph['fin'] = [];

        $costs = [];
        $costs['a'] = 6;
        $costs['b'] = 2;
        $costs['fin'] = INF;

        $parents = [];
        $parents['a'] = 'start';
        $parents['b'] = 'start';
        $parents['fin'] = null;

        $expectedPath = [
            'fin' => 'a',
            'a' => 'b',
            'b' => 'start',
        ];

        $dijkstras = new Dijkstras();
        $actualPath = $dijkstras->search($graph, $costs, $parents);

        asort($expectedPath);
        asort($actualPath);
        $this->assertEquals($expectedPath, $actualPath);
    }
}
