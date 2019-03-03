package Search

import "testing"
import search "github.com/guldmitry/algorithms/Search"
import (
	"math"
	"reflect"
)

func TestDijkstras(t *testing.T) {
	var graph = map[string]map[string]float64{
		"start": {
			"a": 6,
			"b": 2,
		},
		"a": {
			"fin": 1,
		},
		"b": {
			"a":   3,
			"fin": 5,
		},
		"fin": {},
	}
	var costs = map[string]float64{
		"a":   6,
		"b":   2,
		"fin": math.Inf(0),
	}
	var parents = map[string]string{
		"a":   "start",
		"b":   "start",
		"fin": "",
	}
	var expectedPath = map[string]string{
		"fin": "a",
		"a":   "b",
		"b":   "start",
	}

	actualPath := search.Dijkstras(graph, costs, parents)

	if !reflect.DeepEqual(expectedPath, actualPath) {
		t.Error("Invalid path has been built.")
	}
}
