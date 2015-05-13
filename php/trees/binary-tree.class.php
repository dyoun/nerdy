<?php

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

}

