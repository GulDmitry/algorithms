package Sorting

func Sort(raw []int, ascDirection bool) []int {
	length := len(raw)

	rawCopy := make([]int, length)
	copy(rawCopy, raw)
	isSwapped := false
	var compareExpression bool

	for ok := true; ok; ok = isSwapped {
		isSwapped = false
		for k, v := range rawCopy {

			if length == k+1 {
				continue
			}

			nextV := rawCopy[k+1]

			if ascDirection {
				compareExpression = v > nextV
			} else {
				compareExpression = v < nextV
			}
			if compareExpression {
				rawCopy[k], rawCopy[k+1] = rawCopy[k+1], rawCopy[k]
				isSwapped = true
			}
		}
	}
	return rawCopy
}
