<?php

namespace GulDmitry\Algorithms;

class Fibonacci
{
    public function generateSimple(int $count): array
    {
        $res = [0, 1];
        for ($i = 1; $i < ($count - 1); $i++) {
            $res[$i + 1] = $res[$i - 1] + $res[$i];
        }
        return $res;
    }

    public function generateMath(int $count): array
    {
        $res = [];
        for ($i = 0; $i < $count; $i++) {
            $res[] = (int)round(((5 ** .5 + 1) / 2) ** $i / 5 ** .5);
        }
        return $res;
    }
}
