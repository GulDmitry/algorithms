package Sorting

import "testing"
import (
	sorting "github.com/guldmitry/algorithms/Sorting"
	"sort"
	"reflect"
)

func makeRange(min, max int) []int {
	a := make([]int, max-min+1)
	for i := range a {
		a[i] = min + i
	}
	return a
}

func TestSum(t *testing.T) {
	shuffled := makeRange(-101, 101)
	expectedAsc := append([]int(nil), shuffled...)
	sort.Ints(expectedAsc)

	expectedDesc := append([]int(nil), expectedAsc...)
	sort.Sort(sort.Reverse(sort.IntSlice(expectedDesc)))

	actualAsc := sorting.Sort(shuffled, true)
	actualDesc := sorting.Sort(shuffled, false)

	errorMessageTpl := "Arrays are not equal, want: %v, got: %v."
	if !reflect.DeepEqual(expectedAsc, actualAsc) {
		t.Errorf(errorMessageTpl, expectedAsc, actualAsc)
	}
	if !reflect.DeepEqual(expectedDesc, actualDesc) {
		t.Errorf(errorMessageTpl, expectedDesc, actualDesc)
	}
}
