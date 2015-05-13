<?php
require 'binary-tree.class.php';
require 'traverse.class.php';
require 'height.class.php';

$tree = new BinaryTreeTraverse();
$tree->insert(23)->insert(24)->insert(22)->insert(25)->insert(21);
// check if tree is height balanced
$tree->balanced();
$tree->insert(20);
$tree->balanced();
$tree->insert(19);
$tree->balanced();

$tree->balancedIterative();
$tree->insert(20);
$tree->balancedIterative();
$tree->insert(19)->insert(18);
$tree->balancedIterative();