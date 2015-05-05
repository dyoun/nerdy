<?php

$tree = new BinaryTree();
$tree->insert(23)->insert(24)->insert(22)->insert(25)->insert(21);
print_r($tree);
// echo "In-Order\n";
// $tree->inOrder();
// echo "Pre-Order\n";
// $tree->preOrder();
// echo "Post-Order\n";
// $tree->postOrder();
// echo "Level-Order\n";
// $tree->levelOrder();

// traverse biggest to smallest
$tree->findDescK(1);

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
  public $count;
  public $largest = array();

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
  // pre-order traversal; root, left, right - for inserting nodes
  public function preOrder() {
    $this->traversePreOrder($this->root); return $this;
  }
  public function traversePreOrder(&$subtree) {
    if ($subtree == null) return null;
    echo $subtree->data . "\n";
    $this->traversePreOrder($subtree->left);
    $this->traversePreOrder($subtree->right);
  }
  // in-order traversal; left, root, right - binary/DFS search
  public function inOrder() {
    $this->traverseInOrder($this->root); return $this;
  }
  public function traverseInOrder(&$subtree) {
    if ($subtree == null) return null;

    $this->traverseInOrder($subtree->left);
    echo $subtree->data . "\n";
    $this->traverseInOrder($subtree->right);
  }
  // post-order; left, right, root - delete nodes
  public function postOrder() {
    $this->traversePostOrder($this->root); return $this;
  }
  public function traversePostOrder(&$subtree) {
    if ($subtree == null) return null;
    $this->traversePostOrder($subtree->left);
    $this->traversePostOrder($subtree->right);
    echo $subtree->data . "\n";
  }
  // level-order; left, right, child - BFS search
  public function levelOrder() {
    $this->traverseLevelOrder($this->root); return $this;
  }
  /**
   * basic logic
   *  queue root node
   *  while queue not empty
   *  queue left node
   *  queue right node
   */
  public function traverseLevelOrder(&$subtree) {
    $q = new SplQueue();
    $q->enqueue($subtree);

    while (!$q->isEmpty()) {
      $node = $q->dequeue();
      echo $node->data . "\n";

      if ($node->left != null) {
        $q->enqueue($node->left);
      }
      if ($node->right != null) {
        $q->enqueue($node->right);
      }
    }
  }

  public function findDescK($k) {
    // start at root node
    echo "Find largest ($k) descending element\n";
    $this->traverseDesc($this->root, $k);
    $kthOfi = count($this->largest) - (count($this->largest) - ($k-1));
    echo "Kth Largest is: " . $this->largest[$kthOfi] . "\n";
    echo "Tree: " . print_r($this->largest,1);
  }
  // traversing; right, root, left, should produce a desc list
  public function traverseDesc($node, $k) {
    if ($node === null) return;

    $this->traverseDesc($node->right, $k);
    $this->largest[] = $node->data;
    $this->traverseDesc($node->left, $k);
  }
}

