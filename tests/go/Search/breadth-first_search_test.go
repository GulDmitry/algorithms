package Search

import "testing"
import (
	search "github.com/guldmitry/algorithms/Search"
)

func TestBFS(t *testing.T) {
	var graph = map[string][]string{
		"you": {
			"alice", "bob", "claire",
		},
		"bob": {
			"anuj", "peggy",
		},
		"alice": {
			"thom", "jonny",
		},
		"claire": {
			"you",
		},
		"anuj":  {},
		"peggy": {},
		"thom":  {},
		"jonny": {},
	}

	if "thom" != search.BFS(graph, "you", func(edge string) bool {
		return edge == "thom"
	}) {
		t.Error("Element was not found.")
	}

	if "" != search.BFS(graph, "you", func(edge string) bool {
		return edge == "mahmed"
	}) {
		t.Error("Element was not found.")
	}
}
