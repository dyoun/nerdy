<?php
/**
 * rotate a NxN matrix 90 degrees in place
 */
$matrix3 = array( array(1,2,3),
                  array(4,5,6),
                  array(7,8,9)
                );

$matrix3rotated = array(
                  array(1,2,3),
                  array(4,5,6),
                  array(7,8,9)
                );

$matrix5 = array( array(73,56,84,65,45),
                  array(56,85,37,45,85),
                  array(27,56,54,85,44),
                  array(27,56,54,85,44)
                );

print_r($matrix3);
//print_r($matrix5);

$transform = new Transform($matrix3);
$transform->rotate(3);
print_r($transform->matrix);

class Transform {
  public $matrix;

  function __construct($matrix) {
    $this->matrix = $matrix;
  }

  function rotate($n) {
    $matrix = &$this->matrix;

    for ($layer = 0; $layer < $n/2; ++$layer) {
      $first = $layer;
      $last = $n -1 - $layer;
      for ($i=$first; $i < $last; ++$i) {
        $offset = $i - $first;
        $top = $matrix[$first][$i];
        // left -> top
        $matrix[$first][$i] = $matrix[$last-$offset][$first];
        // bottom -> left
        $matrix[$last-$offset][$first] = $matrix[$last][$last-$offset];
        // right -> bottom
        $matrix[$last][$last - $offset] = $matrix[$i][$last];
        // top -> right
        $matrix[$i][$last] = $top;
      }
    }
  }
}