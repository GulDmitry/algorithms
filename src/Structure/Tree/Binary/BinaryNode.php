<?php

namespace GulDmitry\Algorithms\Structure\Tree\Binary;

class BinaryNode
{
    /**
     * @var int
     */
    private $value;
    /**
     * @var BinaryNode|null
     */
    private $left;
    /**
     * @var BinaryNode|null
     */
    private $right;
    /**
     * @var BinaryNode|null
     */
    private $parent;

    public function __construct(int $item, BinaryNode $parent = null)
    {
        $this->value = $item;
        $this->parent = $parent;
    }

    /**
     * @param int[] $result
     */
    public function inOrder(array &$result): void
    {
        if ($this->left !== null) {
            $this->left->inOrder($result);
        }
        $result[] = $this->value;
        if ($this->right !== null) {
            $this->right->inOrder($result);
        }
    }

    /**
     * @param int[] $result
     */
    public function preOrder(array &$result): void
    {
        $result[] = $this->value;
        if ($this->left !== null) {
            $this->left->preOrder($result);
        }
        if ($this->right !== null) {
            $this->right->preOrder($result);
        }
    }

    /**
     * @param int[] $result
     */
    public function postOrder(array &$result): void
    {
        if ($this->left !== null) {
            $this->left->postOrder($result);
        }
        if ($this->right !== null) {
            $this->right->postOrder($result);
        }
        $result[] = $this->value;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function getLeft(): ?BinaryNode
    {
        return $this->left;
    }

    public function setLeft(?BinaryNode $left): void
    {
        $this->left = $left;
    }

    public function getRight(): ?BinaryNode
    {
        return $this->right;
    }

    public function setRight(?BinaryNode $right): void
    {
        $this->right = $right;
    }

    public function getParent(): ?BinaryNode
    {
        return $this->parent;
    }

    public function setParent(?BinaryNode $parent): void
    {
        $this->parent = $parent;
    }

    public function unlinkFromParent(?BinaryNode $newParent): void
    {
        if ($this->parent) {
            if ($this->parent->getLeft() && $this->parent->getLeft()->getValue() === $this->value) {
                $this->parent->setLeft(null);
            } elseif ($this->parent->getRight() && $this->parent->getRight()->getValue() === $this->value) {
                $this->parent->setRight(null);
            }
        }
        $this->parent = $newParent;
    }
}
