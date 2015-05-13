<?php

$tree = new BinaryTree();
$tree->insert(4)->insert(5)->insert(6)->insert(7)->insert(1)->insert(2)->insert(3);
$tree->inOrder();
print_r($tree);

// data, left, right
class BinaryNode {
  public $data;
  public $left;
  public $right;

  function __construct($data = null) {
    $this->data = $data;
    $this->left = null;
    $this->right = null;
  }
}

// root, insert, traversal; pre (root, left, right), in (left, root, right), post (left, right root).
class BinaryTree {
  public $root;

  function __construct() {
    $this->root = null;
  }

  public function insert($data) {
    $node = new BinaryNode($data);
    if ($this->root === null) {
      $this->root = $node;
    }
    else {
      $this->binaryInsert($node, $this->root);
    }

    return $this;
  }

  public function binaryInsert($node, &$subtree) {
    if ($subtree === null) {
      $subtree = $node;
    }
    elseif ($node->data < $subtree->data) {
      $this->binaryInsert($node, $subtree->left);
    }
    elseif ($node->data > $subtree->data) {
      $this->binaryInsert($node, $subtree->right);
    }
    else { // duplicate value
    }

    return $this;
  }

  public function inOrder() {
    $this->traverseInOrder($this->root);
  }
  // left, root, right
  public function traverseInOrder($subtree) {
    if ($subtree === null) return null;

    $this->traverseInOrder($subtree->left);
    echo $subtree->data . "\n";
    $this->traverseInOrder($subtree->right);
  }
}