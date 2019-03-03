<?php

namespace GulDmitry\Algorithms\Search;

/**
 * O(log n)
 */
class Binary
{
    /**
     * @param array $searchIn
     * @param int $num
     * @return int|null Position.
     */
    public function search(array $searchIn, int $num): ?int
    {
        sort($searchIn);
        $lowInd = 0;
        $highInd = count($searchIn) - 1;

        while ($lowInd <= $highInd) {
            $midInd = (int)round(($lowInd + $highInd) / 2);
            $midElm = $searchIn[$midInd];

            if ($midElm === $num) {
                return $midInd;
            } elseif ($midElm < $num) {
                $lowInd = $midInd + 1;
            } elseif ($midElm > $num) {
                $highInd = $midInd - 1;
            }
        }
        return null;
    }
}
