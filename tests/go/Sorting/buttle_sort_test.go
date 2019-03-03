package Sorting

import "testing"
import (
	sorting "github.com/guldmitry/algorithms/Sorting"
	"reflect"
	"sort"
	"math/rand"
)

func makeRange(min, max int) []int {
	a := make([]int, max-min+1)
	for i := range a {
		a[i] = min + i
	}
	return a
}

func Shuffle(slice interface{}) {
	rv := reflect.ValueOf(slice)
	swap := reflect.Swapper(slice)
	length := rv.Len()
	for i := length - 1; i > 0; i-- {
		j := rand.Intn(i + 1)
		swap(i, j)
	}
}

func TestBubbleSort(t *testing.T) {
	shuffled := makeRange(-101, 101)
	Shuffle(shuffled)
	expectedAsc := append([]int(nil), shuffled...)
	sort.Ints(expectedAsc)

	expectedDesc := append([]int(nil), expectedAsc...)
	sort.Sort(sort.Reverse(sort.IntSlice(expectedDesc)))

	actualAsc := sorting.Bubble(shuffled, true)
	actualDesc := sorting.Bubble(shuffled, false)

	errorMessageTpl := "Arrays are not equal, want: %v, got: %v."
	if !reflect.DeepEqual(expectedAsc, actualAsc) {
		t.Errorf(errorMessageTpl, expectedAsc, actualAsc)
	}
	if !reflect.DeepEqual(expectedDesc, actualDesc) {
		t.Errorf(errorMessageTpl, expectedDesc, actualDesc)
	}
}
