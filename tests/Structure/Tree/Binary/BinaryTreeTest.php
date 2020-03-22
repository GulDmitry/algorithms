<?php

namespace GulDmitry\Algorithms\Test\Structure\Tree\Binary;

use GulDmitry\Algorithms\Structure\Tree\Binary\BinaryTree;
use PHPUnit\Framework\TestCase;

class BinaryTreeTest extends TestCase
{
    public function testIsEmpty(): void
    {
        $three = new BinaryTree();
        $noElements = $three->isEmpty();

        $three->insert(1);
        $oneElement = $three->isEmpty();

        $this->assertTrue($noElements);
        $this->assertFalse($oneElement);
    }

    /**
     * 10
     * 5 -
     * 3 7 - -
     * 2 4 6 8 - - - -
     * 1 - - - - - - 9 - - - - - - - -
     */
    public function testInOrder(): void
    {
        $expected = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

        $three = new BinaryTree();

        $three->insert(10);
        $three->insert(5);
        $three->insert(7);
        $three->insert(8);
        $three->insert(3);
        $three->insert(2);
        $three->insert(6);
        $three->insert(9);
        $three->insert(1);
        $three->insert(4);

        $actual = $three->inOrder();

        $this->assertSame($expected, $actual);
    }

    /**
     * 10
     * 5 -
     * 3 7 - -
     * 2 4 6 8 - - - -
     * 1 - - - - - - 9 - - - - - - - -
     */
    public function testPreOrder(): void
    {
        $expected = [10, 5, 3, 2, 1, 4, 7, 6, 8, 9];

        $three = new BinaryTree();

        $three->insert(10);
        $three->insert(5);
        $three->insert(7);
        $three->insert(8);
        $three->insert(3);
        $three->insert(2);
        $three->insert(6);
        $three->insert(9);
        $three->insert(1);
        $three->insert(4);

        $actual = $three->preOrder();

        $this->assertSame($expected, $actual);
    }

    /**
     * 10
     * 5 -
     * 3 7 - -
     * 2 4 6 8 - - - -
     * 1 - - - - - - 9 - - - - - - - -
     */
    public function testPostOrder(): void
    {
        $expected = [1, 2, 4, 3, 6, 9, 8, 7, 5, 10];

        $three = new BinaryTree();

        $three->insert(10);
        $three->insert(5);
        $three->insert(7);
        $three->insert(8);
        $three->insert(3);
        $three->insert(2);
        $three->insert(6);
        $three->insert(9);
        $three->insert(1);
        $three->insert(4);

        $actual = $three->postOrder();

        $this->assertSame($expected, $actual);
    }

    public function testDeleteNoRightNode(): void
    {
        $expected = [1, 4, 10, 17, 20, 31, 35, 99];

        $three = new BinaryTree();

        $three->insert(10);
        $three->insert(5);
        $three->insert(35);
        $three->insert(1);
        $three->insert(20);
        $three->insert(99);
        $three->insert(4);
        $three->insert(17);
        $three->insert(31);

        $three->remove(5);

        $actual = $three->inOrder();

        $this->assertSame($expected, $actual);
    }

    public function testDelete(): void
    {
        $expected = [1, 4, 17, 20, 31, 33, 35, 99];

        $three = new BinaryTree();

        $three->insert(33);
        $three->insert(5);
        $three->insert(35);
        $three->insert(1);
        $three->insert(20);
        $three->insert(99);
        $three->insert(4);
        $three->insert(17);
        $three->insert(31);

        $three->remove(5);

        $actual = $three->inOrder();

        $this->assertSame($expected, $actual);
    }

    public function testDeleteRoot(): void
    {
        $expected = [1, 5, 20, 35, 99];

        $three = new BinaryTree();

        $three->insert(33);
        $three->insert(5);
        $three->insert(35);
        $three->insert(1);
        $three->insert(20);
        $three->insert(99);

        $three->remove(33);

        $actual = $three->inOrder();

        $this->assertSame($expected, $actual);
    }

    /**
     * 10
     * 5 -
     * 3 7 - -
     * 2 4 6 8 - - - -
     * 1 - - - - - - 9 - - - - - - - -
     */
    public function testLevelOrder(): void
    {
        $expected = [10, 5, 3, 7, 2, 4, 6, 8, 1, 9,];
        $three = new BinaryTree();

        $three->insert(10);
        $three->insert(5);
        $three->insert(7);
        $three->insert(8);
        $three->insert(3);
        $three->insert(2);
        $three->insert(6);
        $three->insert(9);
        $three->insert(1);
        $three->insert(4);

        $actual = $three->levelOrder();

        $this->assertSame($expected, $actual);
    }
}
