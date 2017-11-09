package Sorting

import (
	"testing"
	"github.com/guldmitry/algorithms"
	"reflect"
	"sort"
)

func TestSetCover(t *testing.T) {
	statesNeeded := []string{
		"mt", "wa", "or", "id", "nv", "ut", "ca", "az",
	}
	stations := map[string][]string{
		"kone":   {"id", "nv", "ut", "ca"},
		"ktwo":   {"wa", "id", "mt"},
		"kthree": {"or", "nv", "ca"},
		"kfour":  {"nv", "ut"},
		"kfive":  {"az"},
	}
	expected := []string{
		"kone",
		"ktwo",
		"kthree",
		"kfive",
	}

	actual := algorithms.SetCover(stations, statesNeeded)

	sort.Strings(expected)
	sort.Strings(actual)
	if !reflect.DeepEqual(expected, actual) {
		t.Errorf("Intersection is invalid, want: %v, got: %v.", expected, actual)
	}
}
