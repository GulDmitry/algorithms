<?php

namespace GulDmitry\Algorithms\Structure\Tree\Binary;

use SplQueue;

/**
 * Search: log2(n)
 */
class BinaryTree
{
    /**
     * @var BinaryNode|null
     */
    private $root;

    public function isEmpty(): bool
    {
        return $this->root === null;
    }

    public function insert(int $item): void
    {
        if ($this->isEmpty()) {
            $this->root = new BinaryNode($item);
        } else {
            $this->insertNode($this->root, $item);
        }
    }

    /**
     * Three is not empty.
     */
    private function insertNode(BinaryNode $node, int $value): void
    {
        if ($value > $node->getValue()) {
            if ($node->getRight() === null) {
                $node->setRight(new BinaryNode($value, $node));
            } else {
                $this->insertNode($node->getRight(), $value);
            }
        } elseif ($value < $node->getValue()) {
            if ($node->getLeft() === null) {
                $node->setLeft(new BinaryNode($value, $node));
            } else {
                $this->insertNode($node->getLeft(), $value);
            }
        }
        // Avoid duplicates.
    }

    // DFS: in|pre|postOrder are depth-first traversals which visit all the nodes in the tree.
    // Without storing parent in node, use "stack" to store node for future processing.
    /**
     * In-order (symmetrical) - first flow the left side, handle current node and flow the right.
     * @return int[]
     */
    public function inOrder(): array
    {
        $result = [];
        $this->root->inOrder($result);
        return $result;
    }

    /**
     * Прямой. Is used for inserting new nodes or copying subtree.
     * @return int[]
     */
    public function preOrder(): array
    {
        $result = [];
        $this->root->preOrder($result);
        return $result;
    }

    /**
     * Обратный. Is used for removing nodes.
     * @return int[]
     */
    public function postOrder(): array
    {
        $result = [];
        $this->root->postOrder($result);
        return $result;
    }

    // BFS: Breadth-first traversal.
    // User queue for processing.
    public function levelOrder(): array
    {
        $result = [];
        $queue = new SplQueue();

        $top = $this->root;
        do {
            $result[] = $top->getValue();

            if ($top->getLeft()) {
                $queue->enqueue($top->getLeft());
            }
            if ($top->getRight()) {
                $queue->enqueue($top->getRight());
            }
            $top = $queue->isEmpty() ? null: $queue->dequeue();
        } while ($top || !$queue->isEmpty());
        return $result;
    }

    public function remove(int $value): void
    {
        $find = static function (int $value, ?BinaryNode $node) use (&$find): ?BinaryNode {
            if (!$node || $value === $node->getValue()) {
                return $node;
            }
            $next = $value > $node->getValue() ? $node->getRight() : $node->getLeft();
            return $find($value, $next);
        };
        $findMin = static function (BinaryNode $node) use (&$findMin): BinaryNode {
            if ($node->getLeft() !== null) {
                $node = $findMin($node->getLeft());
            }
            return $node;
        };

        $found = $find($value, $this->root);

        if ($found) {
            // If no right element just remove and copy left three.
            if ($found->getRight() === null) {
                $parent = $found->getParent();
                $leftTree = $found->getLeft();
                if ($leftTree) {
                    $leftTree->setParent($parent);
                }
                if ($parent && $parent->getValue() > $value) {
                    $parent->setLeft($leftTree);
                } else {
                    $parent->setRight($leftTree);
                }
            } else {
                // Otherwise find minimal element in right tree and replace removing node.
                $parent = $found->getParent();

                $minNode = $findMin($found->getRight());

                $minNode->unlinkFromParent($parent);
                if ($found->getLeft()) {
                    $minNode->setLeft($found->getLeft());
                }
                if ($found->getRight()) {
                    $minNode->setRight($found->getRight());
                }
                if ($found->getValue() === $this->root->getValue()) {
                    $this->root = $minNode;
                }

                if ($parent) {
                    if ($parent->getValue() > $value) {
                        $parent->setLeft($minNode);
                    } else {
                        $parent->setRight($minNode);
                    }
                }
            }
        }
    }
}
