<?php
/**
 * convert a binary search tree to a circular linked list
 * @source http://codercareer.blogspot.com/2011/09/interview-question-no-1-binary-search.html
 */
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
    $this->head->left = &$this->tail;
  }
  /**
   * recurse left tree
   * set current->left to prev node
   * prev !null, set prev->right to current
   * prev = current
   * recurse right tree
   */
  public function convert(&$node, &$prev) {
    if ($node == null) return;
    $current = $node;

    $this->convert($current->left, $prev);

    $current->left = $prev;
    if ($prev != null) {
      // assigned by value to make it human readable, but should be $current
      $prev->right = $current->data;
    }
    $prev = $current;

    $this->convert($current->right, $prev);
  }
  /**
   * BFS order of tree to linked list
   * https://www.youtube.com/watch?v=WJZtqZJpSlQ
   * basic algo
   *  BFS traversal
   *  set current left to prev
   *  if not empty, set current right to top
   *  set prev to current
   *  set tail to current
   */
  public function toLinkedListBFS() {
    $prev = null;

    if ($this->root == null) return;

    $q = new SplQueue();
    $q->enqueue($this->root);

    while (!$q->isEmpty()) {
      $current = $q->dequeue();

      if ($current->left != null) $q->enqueue($current->left);
      if ($current->right != null) $q->enqueue($current->right);

      $current->left = $prev;
      if (!$q->isEmpty()) $current->right = $q->top();
      $prev = $current;
      $this->tail = $prev;
    }
  }
}

// create a tree
$tree = new BSTtoLL();
$tree->insert(4)->insert(6)->insert(2)->insert(7)->insert(5)->insert(3)->insert(1);
//print_r($tree);
//$tree->toLinkedList();
//print_r($tree);

// create a new tree for BFS ordering
$treeBFS = new BSTtoLL();
$treeBFS->insert(4)->insert(6)->insert(2)->insert(7)->insert(5)->insert(3)->insert(1);
print_r($treeBFS);
$treeBFS->toLinkedListBFS();
print_r($treeBFS);
