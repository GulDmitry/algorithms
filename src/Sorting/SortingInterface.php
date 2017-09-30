<?php

namespace GulDmitry\Algorithms\Sorting;

interface SortingInterface
{
    public function sort(array $raw, bool $ascDirection = true): array;
}
