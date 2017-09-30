<?php

namespace GulDmitry\Algorithms\Sorting;

class BubbleSort implements SortingInterface
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
