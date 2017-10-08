package Search

import "testing"
import (
	search "github.com/guldmitry/algorithms/Search"
)

func makeRange(min, max int) []int {
	a := make([]int, max-min+1)
	for i := range a {
		a[i] = min + i
	}
	return a
}

var dataProvider = []struct {
	input            []int
	num              int
	expectedPosition int
}{
	{makeRange(-101, 101), 0, 101},
	{makeRange(-101, 101), -100, 1},
	{makeRange(-101, 101), 1, 102},
	{makeRange(-101, 101), 101, 202},
	{makeRange(-101, 101), 999, -1},
	{[]int{1, 2, 1}, 1, 1},
}

func TestSearch(t *testing.T) {
	for _, v := range dataProvider {
		actualPosition := search.Search(v.input, v.num)
		if v.expectedPosition != actualPosition {
			t.Errorf("Want `%d`, got `%d`", v.expectedPosition, actualPosition)
		}
	}
}
