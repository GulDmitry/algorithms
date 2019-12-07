<?php

namespace GulDmitry\Algorithms\Sorting;

/**
 * O(n log n)
 */
class MergeSort
{
    public function sort(array $raw, bool $ascDirection = true): array
    {
        $initialSize = count($raw);
        if ($initialSize === 1) {
            return $raw;
        }
        $mid = $initialSize / 2;
        $left = array_slice($raw, 0, $mid);
        $right = array_slice($raw, $mid);

        $leftMerged = $this->sort($left, $ascDirection);
        $rightMerged = $this->sort($right, $ascDirection);

        return $this->merge($leftMerged, $rightMerged, $ascDirection);
    }

    private function merge(array $left, array $right, bool $ascDirection = true): array
    {
        $sortedArray = [];

        while (count($left) > 0 && count($right) > 0) {
            if ($left[0] > $right[0]) {
                if ($ascDirection) {
                    $sortedArray[] = array_shift($right);
                } else {
                    $sortedArray[] = array_shift($left);
                }
            } elseif ($ascDirection) {
                $sortedArray[] = array_shift($left);
            } else {
                $sortedArray[] = array_shift($right);
            }
        }
        while (count($left) > 0) {
            $sortedArray[] = array_shift($left);
        }
        while (count($right) > 0) {
            $sortedArray[] = array_shift($right);
        }

        return $sortedArray;
    }
}
