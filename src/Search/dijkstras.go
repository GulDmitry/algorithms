package Search

import (
	"math"
)

func Dijkstras(
	graph map[string]map[string]float64,
	costs map[string]float64,
	parents map[string]string,
) map[string]string {
	path := map[string]string{}
	for k, v := range parents {
		path[k] = v
	}
	processed := []string{}

	findLowestElement := func() string {
		result := ""
		lowestValue := math.Inf(0)
	OUTER:
		for k, v := range costs {
			for _, v := range processed {
				if k == v {
					continue OUTER
				}
			}
			if v < lowestValue {
				result = k
			}
		}
		return result
	}

	node := findLowestElement()
	for node != "" {
		cost := costs[node]
		neighbors := graph[node]

		for k, neighborCost := range neighbors {
			newCost := cost + neighborCost

			if newCost < costs[k] {
				costs[k] = newCost
				path[k] = node
			}
		}
		processed = append(processed, node)
		node = findLowestElement()
	}

	return path
}
