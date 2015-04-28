<?php

$tree = new BinaryTree();
$tree->insert(3)->insert(4)->insert(2)->insert(5)->insert(1);
print_r($tree);
echo "In-Order\n";
$tree->inOrder();
echo "Pre-Order\n";
$tree->preOrder();
echo "Post-Order\n";
$tree->postOrder();
/**
 * http://www.sitepoint.com/data-structures-2/
 */
class BinaryNode {
  public $data;
  public $left;
  public $right;

  function __construct($data = null) {
    $this->data = $data;
    $left = null;
    $right = null;
  }
}

class BinaryTree {
  public $root;

  function __construct() {
    $this->root = null;
  }

  public function isEmpty() {
    return $this->root == null;
  }

  public function insert($data) {
    $node = new BinaryNode($data);
    if ($this->isEmpty()) {
      $this->root = $node;
    }
    else{
      $this->insertNode($node, $this->root);
    }

    return $this;
  }
  /**
   * simple recursive binary insert w/o balancing; less than insert left node,
   * greater than insert right node
   */
  protected function insertNode($node, &$subtree) {
    if ($subtree == null) {
      $subtree = $node;
    }
    else {
      // right subtree
      if ($node->data > $subtree->data) {
        $this->insertNode($node, $subtree->right);
      }
      elseif ($node->data < $subtree->data) {
        $this->insertNode($node, $subtree->left);
      }
      else{
        // duplicate
      }
    }
  }
  // in-order traversal; left, root, right
  public function inOrder() {
    $this->traverseInOrder($this->root); return $this;
  }
  public function traverseInOrder(&$subtree) {
    if ($subtree == null) return null;

    $this->traverseInOrder($subtree->left);
    echo $subtree->data . "\n";
    $this->traverseInOrder($subtree->right);
  }
  // pre-order traversal; root, left, right
  public function preOrder() {
    $this->traversePreOrder($this->root); return $this;
  }
  public function traversePreOrder(&$subtree) {
    if ($subtree == null) return null;
    echo $subtree->data . "\n";
    $this->traversePreOrder($subtree->left);
    $this->traversePreOrder($subtree->right);
  }
  // post-order; left, right, root
  public function postOrder() {
    $this->traversePostOrder($this->root); return $this;
  }
  public function traversePostOrder(&$subtree) {
    if ($subtree == null) return null;
    $this->traversePostOrder($subtree->left);
    $this->traversePostOrder($subtree->right);
    echo $subtree->data . "\n";
  }
}