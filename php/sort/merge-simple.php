<?php
/**
 * 1. Divide the unsorted list into n sublists, each containing 1 element
 *  (a list of 1 element is considered sorted).
 * 2. Repeatedly merge sublists to produce new sorted sublists until
 *  there is only 1 sublist remaining. This will be the sorted list.
  */

$array = array( 3, 1, 4, 1, 5, 9, 2, 6, 5, 3, 8, 9, 7, 9, 3, 2, 3, 8, 4 );
$array = merge_sort($array);
//format as a string and output
echo "The sorted array is: " . implode(', ', $array ) . "\n";

function merge_sort(&$array) {
  //if array is but one element, array is sorted, so return as is
  if ( sizeof ( $array ) <= 1 ) return $array;
  // divide the array
  $array2 = array_splice($array, (sizeof($array)/2) );
  //recursively merge-sort and return
  return merge(merge_sort($array), merge_sort($array2));
}

/**
 * Helper function for bb_merge_sort, merges two arrays into one sorted array
 * @param array $array1 one array
 * @param array $array2 another array
 * @returns array the sorted, merged array
 */
function merge($array1, $array2) {
  //init an empty output array
  $output = array();

  //loop through the arrays while at least one still has elements left in it
  while(!empty($array1) || !empty($array2))
    //one of the arrays is empty, so the last man standing wins...
    if (empty($array1) || empty($array2))
      $output[] = (empty($array2)) ?
        array_shift($array1) : array_shift($array2);
    else //both arrays still have elements, looks like we have a showdown...
      $output[] = ( $array1[0] <= $array2[0] ) ?
        array_shift($array1) : array_shift($array2);

  //pass back the output array
  return $output;
}