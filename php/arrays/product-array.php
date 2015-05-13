<?php
/**
 * Given an array arr[] of n integers, construct a Product Array prod[] (of same size) such that prod[i] is equal to the product of all the elements of arr[] except arr[i]. Solve it without division operator and in O(n).
 * [1 2 3 4 5] query 3, get the result of 1*2*4*5, can't use division
 * Input : [1, 2, 3, 4, 5]
 * Output: [(2*3*4*5), (1*3*4*5), (1*2*4*5), (1*2*3*5), (1*2*3*4)]
 *         [=120,      =60,       =40,       =30,       =24]
 *
 * Algorithm:
 *  1) Construct a temporary array left[] such that left[i] contains product of all elements on left of arr[i] excluding arr[i].
 *  2) Construct another temporary array right[] such that right[i] contains product of all elements on on right of arr[i] excluding arr[i].
 *  3) To get prod[], multiply left[] and right[].
 * http://www.geeksforgeeks.org/a-product-array-puzzle/
 */

$products = array(1, 2, 3, 4, 5);
$n = count($products)/count($products[0]);
$productArray = new ProductArray();
//$productArray->resultv1($products, $n);
print_r($products);
$productArray->resultv2($products, 5);

class ProductArray {

  function __construct() {}

  public function resultv2($arr, $n){
    $i; $temp = 1;
    $prod = array();

  /* In this loop, temp variable contains product of
    elements on left side excluding arr[i] */
  for($i=0; $i<$n; $i++) {
    $prod[$i] = $temp;
    $temp *= $arr[$i];
  }

  /* Initialize temp to 1 for product on right side */
  $temp = 1;

  /* In this loop, temp variable contains product of
    elements on right side excluding arr[i] */
  for($i=$n-1; $i>=0; $i--) {
    $prod[$i] *= $temp;
    $temp *= $arr[$i];
  }

  /* print the constructed prod array */
  echo print_r($prod, 1) . " $n \n";


}

  public function resultv1($products, $n) {
    $left = array();
    $right = array();
    $product = array();
    $i = 0; $j = 0;

    echo 'products ' . print_r($products,1) . "\n";

    // element 0 always equals 1
    $left[0] = 1;
    // right most element is always 1
    $right[$n-1] = 1;

    // construct left array
    for ($i=1; $i<$n; $i++) {
      $left[$i] = $products[$i-1] * $left[$i-1];
    }

    // construct right array
    for ($j=$n-2; $j>=0; $j--) {
      $right[$j] = $products[$j+1] * $right[$j+1];
    }

    // construct product array using left[] and right[]
    for ($i=0; $i<$n; $i++) {
      $products[$i] = $left[$i] * $right[$i];
    }
    // print product array
    for ($i=0; $i<$n; $i++) {
      echo $products[$i] . " [$i]\n";
    }

    echo "\n";
  }
}