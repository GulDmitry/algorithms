<?php

namespace GulDmitry\Algorithms\Sorting;

/**
 * O(n*log n)
 */
class QuickSort
{
    public function sort(array $raw, bool $ascDirection = true): array
    {
        if (count($raw) < 2) {
            return $raw;
        }

        $pivotKey = array_rand($raw);
        $pivotValue = $raw[$pivotKey];

        unset($raw[$pivotKey]);

        $less = array_filter($raw, function ($v) use ($pivotValue) {
            return $v < $pivotValue;
        });
        $greater = array_filter($raw, function ($v) use ($pivotValue) {
            return $v >= $pivotValue;
        });

        if (!$ascDirection) {
            list($less, $greater) = [$greater, $less];
        }
        return $this->sort($less, $ascDirection) + [$pivotKey => $pivotValue] + $this->sort($greater, $ascDirection);
    }
}
