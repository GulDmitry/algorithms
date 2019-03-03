package algorithms

import (
	"strings"
)

func KnapsackProblem(items map[string]map[string]int, capacity int) []string {
	cells := map[int]map[int]int{}
	products := map[int]map[int]string{}

	for i := 0; i < len(items); i++ {
		cells[i] = map[int]int{}
		products[i] = map[int]string{}
	}

	row := 0
	for item, stats := range items {
		for column := 1; column <= capacity; column++ {

			itemPrice := map[string]int{
				products[row-1][column]: cells[row-1][column],
				products[row][column-1]: cells[row][column-1],
			}
			if stats["size"] <= column {
				itemPrice[products[row-1][column-stats["size"]]+","+item] =
					stats["price"] + cells[row-1][column-stats["size"]]
			}

			var itemWithMaxValue string
			maxValue := 0
			for item, value := range itemPrice {
				if value > maxValue {
					maxValue = value
					itemWithMaxValue = item
				}
			}

			cells[row][column] = maxValue
			products[row][column] = itemWithMaxValue
		}
		row++
	}

	return strings.Split(strings.Trim(products[len(items)-1][capacity], ","), ",")
}
