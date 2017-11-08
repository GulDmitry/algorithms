package Sorting

import (
	"testing"
	"github.com/guldmitry/algorithms"
	"reflect"
	"sort"
)

func TestKnapsackProblem(t *testing.T) {
	items := map[string]map[string]int{
		"item1": {"size": 4, "price": 3000},
		"item2": {"size": 1, "price": 1500},
		"item3": {"size": 3, "price": 2000},
		"item4": {"size": 1, "price": 2000},
		"item5": {"size": 2, "price": 1000},
	}
	capacity := 4
	expected := []string{
		"item2",
		"item4",
		"item5",
	}

	actual := algorithms.KnapsackProblem(items, capacity)

	sort.Strings(expected)
	sort.Strings(actual)
	if !reflect.DeepEqual(expected, actual) {
		t.Errorf("Sets are invalid, want: %v, got: %v.", expected, actual)
	}
}
