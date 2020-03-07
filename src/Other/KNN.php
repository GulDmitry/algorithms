<?php

namespace GulDmitry\Algorithms\Other;

/**
 * k-nearest neighbors algorithm.
 * Pythagoras's formula: sqrt((a1 - a2) ** 2 + (b1 - b2) ** 2 + ...)
 * TODO: Union of Polyhedral Cones instead.
 */
class KNN
{
    public function classify(array $dataMatrix, int $relatedTo): array
    {
        $distance = [$relatedTo => 0];
        $targetColumn = array_column($dataMatrix, $relatedTo);
        $userLength = count($dataMatrix[0]);

        for ($i = 0; $i < $userLength; $i++) {
            if ($i === $relatedTo) {
                continue;
            }
            $columnResult = 0;
            foreach (array_column($dataMatrix, $i) as $columnK => $columnV) {
                $columnResult += ($targetColumn[$columnK] - $columnV) ** 2;
            }
            $distance[$i] = floor(sqrt($columnResult) * 100) / 100;

        }
        return $distance;
    }

    public function regression(array $dataMatrix, array $for, int $kNeighbor): float
    {
        $distanceMatrix = [];

        foreach ($dataMatrix as $k => $v) {
            $dist = 0;
            for ($i = 0; $i < count($for); $i++) {
                $dist += ($for[$i] - $v[$i]) ** 2;
            }
            $distanceMatrix[$k] = floor(sqrt($dist) * 100) / 100;
        }

        asort($distanceMatrix);
        $closestNeighborsValues = array_keys(array_slice($distanceMatrix, 0, $kNeighbor, true));

        return floor((array_sum($closestNeighborsValues) / $kNeighbor) * 100) / 100;
    }
}
