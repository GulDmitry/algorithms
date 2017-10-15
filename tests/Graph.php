<?php

namespace GulDmitry\Algorithms\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Node: a block of information in the network.
 * Edge: a connection between two nodes (can have a direction and a weight).
 * Centrality: determining the relative importance of a node.
 * Clustering: partitioning nodes into groups.
 */
class GraphTest extends TestCase
{
    public function testGraph()
    {
        $graph = [];
        $graph['you'] = ['alice', 'bob', 'claire'];
        $graph['bob'] = ['anuj', 'peggy'];
        $graph['alice'] = ['thom', 'jonny'];
        $graph['claire'] = [];
        $graph['anuj'] = [];
        $graph['peggy'] = [];
        $graph['thom'] = [];
        $graph['jonny'] = [];

        $queue = new \SplQueue();

        $queue->push('you');


        $this->assertEquals('thom', $this->findSeller($queue, $graph, 'thom'));
        $this->assertNull($this->findSeller($queue, $graph, 'mahmed'));
    }

    private function findSeller(\SplQueue $queue, array $graph, $seller):?string
    {
        if ($queue->isEmpty()) {
            return null;
        }
        $edge = $queue->shift();

        if ($edge === $seller) {
            return $edge;
        }

        $rel = $graph[$edge];
        foreach ($rel as $node) {
            $queue->push($node);
        }
        return $this->findSeller($queue, $graph, $seller);
    }
}
