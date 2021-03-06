<?php

namespace GulDmitry\Algorithms\Sorting;

/**
 * O(n^2)
 * Worst case - (N-1)*(N/2)
 */
class BubbleSort
{
    public function sort(array $raw, bool $ascDirection = true): array
    {
        $iterator = new \ArrayIterator($raw);
        do {
            $isSwapped = false;

            while ($iterator->valid()) {
                $currentKey = $iterator->key();
                $currentValue = $iterator->current();

                $iterator->next();
                if (!$iterator->valid()) {
                    continue;
                }
                $nextKey = $iterator->key();
                $nextValue = $iterator->current();

                $compareExpression = $ascDirection ? $currentValue > $nextValue : $currentValue < $nextValue;
                if ($compareExpression) {
                    list($iterator[$currentKey], $iterator[$nextKey]) = [$iterator[$nextKey], $iterator[$currentKey]];
                    $isSwapped = true;
                }
            }
            $iterator->rewind();
        } while ($isSwapped);

        return (array)$iterator;
    }
}
