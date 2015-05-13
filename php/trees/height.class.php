<?php
class BinaryTreeHeight extends BinaryTreeTraverse {
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