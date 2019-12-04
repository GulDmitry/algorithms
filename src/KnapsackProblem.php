<?php

namespace GulDmitry\Algorithms;

class KnapsackProblem
{
    public function findCombination(array $items, int $capacity): array
    {
        $cells = [];
        $products = [];

        $fillCell = function (int $row, int $column, int $price, string $items) use (&$products, &$cells) {
            if (!isset($cells[$row])) {
                $cells[$row] = [];
            }
            $cells[$row][$column] = $price;

            if (!isset($products[$row])) {
                $products[$row] = [];
            }
            $products[$row][$column] = $items;
        };

        $row = 0;
        foreach ($items as $item => $stats) {
            for ($column = 1; $column <= $capacity; $column++) {
                $itemPrice = [
                    $products[$row - 1][$column] ?? 0 => $cells[$row - 1][$column] ?? 0,  // Top.
                    $products[$row][$column - 1] ?? 0 => $cells[$row][$column - 1] ?? 0  // Left.
                ];
                if ($stats['size'] <= $column) {
                    $itemPrice[($products[$row - 1][$column - $stats['size']] ?? '') . ',' . $item] =
                        $stats['price'] + ($cells[$row - 1][$column - $stats['size']] ?? 0);
                }
                $itemWithMaxValue = array_keys($itemPrice, max($itemPrice))[0];
                $fillCell(
                    $row,
                    $column,
                    $itemPrice[$itemWithMaxValue],
                    $itemWithMaxValue
                );
            }
            $row++;
        }
        return explode(',', trim($products[count($items) - 1][$capacity], ','));
    }
}
