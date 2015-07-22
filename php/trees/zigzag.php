<?php
require 'binary-tree.class.php';
require 'traverse.class.php';
/**
 * Print a binary tree in zig zag level order; left to right, right to left
 *
 * http://articles.leetcode.com/2010/09/printing-binary-tree-in-zig-zag-level_18.html
 */
class ZigZag extends BinaryTreeTraverse {
  function traverseZigzag() {
    $leftright = true;
    $current = new SplStack();
    $next = new SplStack();

    $current->push($this->root);

    while (!$current->isEmpty()) {
      $node = $current->pop();
      if (!empty($node->data)) {
        echo $node->data . " ";
        if ($leftright) {
          $next->push($node->left);
          $next->push($node->right);
        }
        else{
          $next->push($node->right);
          $next->push($node->left);
        }
      }

      if ($current->isEmpty()){
        echo "\n";
        $leftright = !$leftright;
        $temp = $current;
        $current = $next;
        $next = $temp;
      }
    }

  }
}

// create a tree
$tree = new ZigZag();
$tree->insert(5)->insert(3)->insert(4)->insert(2)->insert(7)->insert(9)->insert(6);
/*
Binary Tree
          5
    3           7
  2   4       6   9

Zig Zag Level Order
  5
  7 3
  2 4 6 9
*/
print_r($tree);
echo "Zig-Zag\n";
$tree->traverseZigzag();
echo "\nLevel Order Traversal:\n";
$tree->levelOrder();

// $tree->insert(23)->insert(24)->insert(22)->insert(25)->insert(21);
/*
      23
   22    24
21          25
*/
