<?php

namespace GulDmitry\Algorithms\Other;

/**
 * Greedy algorithm
 */
class SetCover
{
    public function findCoverage(array $data, array $needed): array
    {
        $finalSet = [];
        while (!empty($needed)) {
            $bestFound = null;
            $bestCoveredSet = [];

            foreach ($data as $k => $v) {
                // $covered = $needed & $v;
                $covered = array_intersect($needed, $v);

                if (count($covered) > count($bestCoveredSet)) {
                    $bestFound = $k;
                    $bestCoveredSet = $covered;
                }
            }
            // $needed -= $bestCoveredSet;
            $needed = array_diff($needed, $bestCoveredSet);
            $finalSet[] = $bestFound;
        }
        return $finalSet;
    }
}
