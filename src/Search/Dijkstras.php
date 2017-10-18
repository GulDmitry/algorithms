<?php

namespace GulDmitry\Algorithms\Search;

/**
 * Directed Acyclic Graph with positive weights.
 */
class Dijkstras
{
    public function search(array $graph, array $costs, array $parents): array
    {
        $processed = [];

        $findLowestExcludeProcessed = function (array $costs, array $processed) {
            $filtered = array_filter($costs, function ($k) use ($costs, $processed) {
                return !in_array($k, $processed);
            }, ARRAY_FILTER_USE_KEY);
            return empty($filtered) ? null : array_keys($filtered, min($filtered))[0];
        };

        $node = $findLowestExcludeProcessed($costs, $processed);
        while ($node !== null) {
            $cost = $costs[$node];
            $neighbors = $graph[$node];

            foreach ($neighbors as $k => $v) {
                $newCost = $cost + $v;

                if ($newCost < $costs[$k]) {
                    $costs[$k] = $newCost;
                    $parents[$k] = $node;
                }
            }
            $processed[] = $node;
            $node = $findLowestExcludeProcessed($costs, $processed);
        }
        return $parents;
    }
}
