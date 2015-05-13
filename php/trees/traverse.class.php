<?php

class BinaryTreeTraverse extends BinaryTree {

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
  // find k largest element
  public function findDescK($k) {
    // start at root node
    echo "Find largest ($k) descending element\n";
    $this->traverseDesc($this->root, $k);
    $kthOfi = count($this->largest) - (count($this->largest) - ($k-1));
    echo "($k) Kth Largest is: " . $this->largest[$kthOfi] . "\n";
    echo "Tree: " . print_r($this->largest,1);
  }
  // traversing; right, root, left, should produce a desc list
  public function traverseDesc($node, $k) {
    if ($node === null) return;

    $this->traverseDesc($node->right, $k);
    $this->largest[] = $node->data;
    $this->traverseDesc($node->left, $k);
  }
  // balanced binary tree check
  public function balanced() {
    echo "Check Balance of Left & Right Subtrees\n";
    $left = 0; $right = 0;

    $this->height($this->root->left, $left);
    $this->height($this->root->right, $right);

    echo "  Left: $left, Right: $right \n";
    $height = ($left > $right) ? $left-$right : $right-$left;
    echo "  ($height) ";
    echo ($height <= 1) ?  "Tree is balanced\n" : "Tree is not balanced\n";
  }

  // balanced binary tree check
  public function balancedIterative() {
    echo "Check Balance of Left & Right Subtrees\n";
    $left = 0; $right = 0;

    $left = $this->heightIterative($this->root->left, null);
    $right = $this->heightIterative($this->root->right, $left);

    echo "  Left: $left, Right: $right \n";
    $height = ($left > $right) ? $left-$right : $right-$left;
    echo "  ($height) ";
    echo ($height <= 1) ?  "Tree is balanced\n" : "Tree is not balanced\n";
  }
  public function height(&$subtree, &$height) {
    if ($subtree == null) return null;

    $this->height($subtree->left, $height);
    $this->height($subtree->right, $height);
    $height++;
  }
  // non-recursive heigh calculation
  public function heightIterative(&$subtree, $height=null) {
    if ($subtree == null) return 0;

    $i = 0;
    $q = new SplQueue();
    $q->enqueue($subtree);
    while (!$q->isEmpty()) {
      $i++; echo $i . " diff: " . ($i-$height) . "\n";

      if (($height != null) && (($i-$height) > 1)) break;

      $node = $q->dequeue();
      if ($node->left != null) $q->enqueue($node->left);
      if ($node->right != null) $q->enqueue($node->right);
    }

    return $i;

  }

}