<?php

namespace GulDmitry\Algorithms\Test\Other;

use GulDmitry\Algorithms\Other\KNN;
use PHPUnit\Framework\TestCase;

class KNNTest extends TestCase
{
    public function testClassification()
    {
        /**
         *           u1, u2, u3
         * c1
         * c2
         * c3
         * c4
         * c5
         */
        $dataMatrix = [
            [3, 4, 2],
            [4, 3, 5],
            [4, 5, 1],
            [1, 1, 3],
            [4, 5, 1],
        ];

        $closestToUser = 0;
        $expectedDistance = [0, 2, 4.89];

        $algorithm = new KNN();
        $actualDistance = $algorithm->classify($dataMatrix, $closestToUser);

        $this->assertEquals($expectedDistance, $actualDistance);
    }

    /**
     * Optimal value for neighbors is sqrt(N).
     */
    public function testRegression()
    {
        $neighbors = 4;
        $dataMatrix = [
            300 => [5, 1, 0],
            225 => [3, 1, 1],
            75 => [1, 1, 0],
            200 => [4, 0, 1],
            150 => [4, 0, 0],
            50 => [2, 0, 0],
        ];

        $findFor = [4, 1, 0];
        $expectedRegression = 218.75;

        $algorithm = new KNN();
        $actualRegression = $algorithm->regression($dataMatrix, $findFor, $neighbors);

        $this->assertEquals($expectedRegression, $actualRegression);
    }

}
