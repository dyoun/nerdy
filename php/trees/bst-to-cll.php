<?php
// http://codercareer.blogspot.com/2011/09/interview-question-no-1-binary-search.html

require 'binary-tree.class.php';
require 'traverse.class.php';

class BSTtoLL extends BinaryTree {
  public $head;
  public $tail;

  function __construct() {
    $this->head = null;
    $this->tail = null;
  }
  public function toLinkedList() {
    $this->convert($this->root, $this->tail);

    $this->head = $this->tail;
    while($this->head !== null && $this->head->left !== null) {
      //echo "head assignment" . print_r($this->head->left,1) . "\n";
      //echo "head assignment" . print_r($this->head,1) . "\n";
      $this->head = &$this->head->left;
    }
    //$this->head->left = &$this->tail;
  }
  public function convert(&$node, &$prev) {
    if ($node == null) return;

    $current = $node;

    if ($current->left != null) {
      $this->convert($current->left, $prev);
    }

    $current->left = $prev;

    if ($prev != null) {
      // assigned by value to make it human readable, but should be $current
      $prev->right = $current->data;
    }

    $prev = $current;

    if ($current->right != null) {
      $this->convert($current->right, $prev);
    }
  }
}

// create a tree
$tree = new BSTtoLL();
$tree->insert(4)->insert(6)->insert(2)->insert(7)->insert(5)->insert(3)->insert(1);
//print_r($tree);

$tree->toLinkedList();
print_r($tree);
