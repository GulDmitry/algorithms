package Sorting

import "testing"
import (
	sorting "github.com/guldmitry/algorithms/Sorting"
	"reflect"
	"sort"
)

func TestSum(t *testing.T) {
	shuffled := []int{
		-1, 1, 7, 2, 0, 1,
	}
	expected := append([]int(nil), shuffled...)
	sort.Ints(expected)

	actual := sorting.Sort(shuffled, true)
	if !reflect.DeepEqual(expected, actual) {
		t.Errorf("Arrays are not equal, want: %v, got: %v.", expected, actual)
	}
}
