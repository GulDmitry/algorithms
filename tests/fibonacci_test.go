package Sorting

import "testing"
import (
	"github.com/guldmitry/algorithms"
	"sync"
	"reflect"
	"sort"
)

func TestSequence(t *testing.T) {
	expected := []int{0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144}

	fibonacci := algorithms.Fibonacci{}
	actualSimple := fibonacci.Simple(len(expected))
	actualMath := fibonacci.Math(len(expected))
	actualGoroutine := []int{}

	// Buffered channel approach.
	//sequenceChan := make(chan int, len(expected))
	//var wg sync.WaitGroup
	//
	//for i := 0; i < len(expected); i++ {
	//	wg.Add(1)
	//	go func(v int) {
	//		defer wg.Done()
	//		fibonacci.Goroutine(v, sequenceChan)
	//	}(i)
	//}
	//
	//wg.Wait()
	//close(sequenceChan)
	//
	//for v := range sequenceChan {
	//	actualGoroutine = append(actualGoroutine, v)
	//}

	// Workers approach
	sequenceChan := make(chan int)
	var mutex = &sync.Mutex{}
	var wg sync.WaitGroup

	// Worker pool.
	for i := 5; i > 0; i-- {
		wg.Add(1)

		go func() {
			defer wg.Done()
			defer mutex.Unlock()

			tmp := []int{}
			for v := range sequenceChan {
				tmp = append(tmp, fibonacci.CountSequenceNumber(v))
			}

			// Race condition on `actualGoroutine` access.
			// Run test with `-race` flag.
			// Do NOT put it inside channel read. Mutex might not be locked.
			mutex.Lock()
			actualGoroutine = append(actualGoroutine, tmp...)
		}()
	}

	for k := range expected {
		sequenceChan <- k
	}

	close(sequenceChan)
	wg.Wait()

	// For both.
	sort.Ints(actualGoroutine)

	errorMessageTpl := "Sequences are not equal, want: %v, got: %v."
	if !reflect.DeepEqual(expected, actualSimple) {
		t.Errorf(errorMessageTpl, expected, actualSimple)
	}
	if !reflect.DeepEqual(expected, actualMath) {
		t.Errorf(errorMessageTpl, expected, actualMath)
	}
	if !reflect.DeepEqual(expected, actualGoroutine) {
		t.Errorf(errorMessageTpl, expected, actualGoroutine)
	}
}
