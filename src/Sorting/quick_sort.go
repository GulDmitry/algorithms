package Sorting

import (
	"math/rand"
)

// O(n * log n)
func Quick(raw []int, ascDirection bool) []int {
	length := len(raw)

	rawCopy := make([]int, length)
	copy(rawCopy, raw)

	if length < 2 {
		return rawCopy
	}
	pivotK := rand.Intn(length)
	pivotV := rawCopy[pivotK]

	less, greater := []int{}, []int{}

	rawCopy = append(rawCopy[:pivotK], rawCopy[pivotK+1:]...)

	for i := range rawCopy {
		v := rawCopy[i]
		if v < pivotV {
			less = append(less, v)
		} else {
			greater = append(greater, v)
		}
	}
	if !ascDirection {
		less, greater = greater, less
	}

	return append(append(Quick(less, ascDirection), pivotV), Quick(greater, ascDirection)...)
}
