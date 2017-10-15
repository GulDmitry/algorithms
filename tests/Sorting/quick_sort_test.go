package Sorting

import "testing"
import (
	sorting "github.com/guldmitry/algorithms/Sorting"
	"sort"
	"reflect"
)

// TODO: use search strategy.
func TestQuickSearch(t *testing.T) {
	//shuffled := makeRange(-101, 101)
	shuffled := []int{1, 2, 3, 4}

	Shuffle(shuffled)
	expectedAsc := append([]int(nil), shuffled...)
	sort.Ints(expectedAsc)

	expectedDesc := append([]int(nil), expectedAsc...)
	sort.Sort(sort.Reverse(sort.IntSlice(expectedDesc)))

	actualAsc := sorting.Quick(shuffled, true)
	actualDesc := sorting.Quick(shuffled, false)

	errorMessageTpl := "Arrays are not equal, want: %v, got: %v."
	if !reflect.DeepEqual(expectedAsc, actualAsc) {
		t.Errorf(errorMessageTpl, expectedAsc, actualAsc)
	}
	if !reflect.DeepEqual(expectedDesc, actualDesc) {
		t.Errorf(errorMessageTpl, expectedDesc, actualDesc)
	}
}
