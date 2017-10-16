<?php

namespace GulDmitry\Algorithms\Tests;

use GulDmitry\Algorithms\Search\BreadthFirstSearch;
use PHPUnit\Framework\TestCase;

class BreadthFirstSearchTest extends TestCase
{
    public function testBFS()
    {
        $graph = [];
        $graph['you'] = ['alice', 'bob', 'claire'];
        $graph['bob'] = ['anuj', 'peggy'];
        $graph['alice'] = ['thom', 'jonny'];
        $graph['claire'] = ['you'];
        $graph['anuj'] = [];
        $graph['peggy'] = [];
        $graph['thom'] = [];
        $graph['jonny'] = [];

        $bfs = new BreadthFirstSearch();

        $this->assertEquals(
            'thom',
            $bfs->search($graph, 'you', function (string $edge): bool {
                return $edge === 'thom';
            })
        );
        $this->assertNull($bfs->search($graph, 'you', function (string $edge): bool {
            return $edge === 'mahmed';
        }));
    }
}
