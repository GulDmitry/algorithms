package algorithms

import (
	"math"
)

type Fibonacci struct{}

func (f *Fibonacci) round(n float64) int {
	return int(n + math.Copysign(0.5, n))
}

func (f *Fibonacci) CountSequenceNumber(number int) int {
	return f.round(math.Pow((math.Pow(5, .5)+1)/2, float64(number)) / math.Pow(5, .5))
}

func (f *Fibonacci) Simple(count int) []int {
	res := []int{0, 1}

	for i := 1; i < count-1; i++ {
		res = append(res, res[i-1]+res[i])
	}
	return res
}

func (f *Fibonacci) Math(count int) []int {
	res := []int{}
	for i := 0; i < count; i++ {
		res = append(res, f.CountSequenceNumber(i))
	}
	return res
}

func (f *Fibonacci) Goroutine(number int, c chan<- int) {
	c <- f.CountSequenceNumber(number)
}
