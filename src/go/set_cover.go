package algorithms

import "strings"

func filter(src []string) (res []string) {
	for _, s := range src {
		newStr := strings.Join(res, " ")
		if !strings.Contains(newStr, s) {
			res = append(res, s)
		}
	}
	return
}

func intersections(slice1, slice2 []string) (intersection []string) {
	str1 := strings.Join(filter(slice1), " ")
	for _, s := range filter(slice2) {
		if strings.Contains(str1, s) {
			intersection = append(intersection, s)
		}
	}
	return
}

func diff(slice1, slice2 []string) (diff []string) {
	for _, sl1V := range slice1 {
		found := false
		for _, sl2V := range slice2 {
			if sl1V == sl2V {
				found = true
			}
		}
		if !found {
			diff = append(diff, sl1V)
		}
	}
	return
}

func SetCover(data map[string][]string, needed []string) (finalSet []string) {
	neededCopy := make([]string, len(needed))
	copy(neededCopy, needed)

	for len(neededCopy) != 0 {
		bestFound := ""
		bestCoveredSet := []string{}

		for k, v := range data {
			covered := intersections(v, neededCopy)

			if len(covered) > len(bestCoveredSet) {
				bestFound = k
				bestCoveredSet = covered
			}
		}
		neededCopy = diff(neededCopy, bestCoveredSet)
		finalSet = append(finalSet, bestFound)
	}
	return
}
