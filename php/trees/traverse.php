<?php
require 'binary-tree.class.php';
require 'traverse.class.php';

// create a tree
$tree = new BinaryTreeTraverse();
// $tree->insert(23)->insert(24)->insert(22)->insert(25)->insert(21);
$tree->insert(4)->insert(2)->insert(6)->insert(1)->insert(3)->insert(5)->insert(7);
print_r($tree);
echo "In-Order\n";
$tree->inOrder();
echo "Pre-Order\n";
$tree->preOrder();
echo "Post-Order\n";
$tree->postOrder();
echo "Level-Order\n";
$tree->levelOrder();

// traverse biggest to smallest
$tree->findDescK(1);