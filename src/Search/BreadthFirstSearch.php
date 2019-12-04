<?php

namespace GulDmitry\Algorithms\Search;

/**
 * O(V + E) - people + edges.
 * Node: a block of information in the network.
 * Edge: a connection between two nodes (can have a direction and a weight).
 * Centrality: determining the relative importance of a node.
 * Clustering: partitioning nodes into groups.
 */
class BreadthFirstSearch
{
    public function search(array $graph, string $start, callable $condition): ?string
    {
        $queue = new \SplQueue();
        $queue->push($start);

        $checked = [];
        while (!$queue->isEmpty()) {
            $edge = $queue->shift();

            if (in_array($edge, $checked)) {
                continue;
            }
            $checked[] = $edge;

            if ($condition($edge)) {
                return $edge;
            }

            $rel = $graph[$edge];
            foreach ($rel as $node) {
                $queue->push($node);
            }
        }
        return null;
    }
}
