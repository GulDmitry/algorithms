package Search

// O(V + E) - people + edges.
func BFS(graph map[string][]string, start string, condition func(string) bool) string {

	queue := []string{start}
	checked := []string{}

OUTER:
	for len(queue) > 0 {
		edge := queue[:1][0]
		queue = append(queue[:0], queue[0+1:]...)

		for _, v := range checked {
			if v == edge {
				continue OUTER
			}
		}
		checked = append(checked, edge)

		if condition(edge) {
			return edge
		}

		for _, v := range graph[edge] {
			queue = append(queue, v)
		}
	}
	return ""
}
