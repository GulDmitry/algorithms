package Search

import "sort"

// log(N)
// -1 if element is not found.
func Binary(input []int, num int) (position int) {
	position = -1
	sort.Ints(input)
	lowInd := 0
	highInd := len(input) - 1

	for lowInd <= highInd {
		midInd := (lowInd + highInd) / 2
		midElm := input[midInd]

		if midElm == num {
			position = midInd
			return
		} else if midElm > num {
			highInd = midInd - 1
		} else if midElm < num {
			lowInd = midInd + 1
		}
	}
	return
}
