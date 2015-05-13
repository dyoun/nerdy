<?php
/**
 * topological sort of a directed acyclical graph (no cycles), ie, create a
 * schedule of dependent tasks
 http://www.stoimen.com/blog/2012/10/01/computer-algorithms-topological-sort-of-a-graph/
 */
$g = new G();
$g->topologicalSort();
/* above outputs:
Array
(
    [0] => 0
    [1] => 5
    [2] => 1
    [3] => 2
    [4] => 3
    [5] => 4
    [6] => 6
)*/


/**
 * pseudo code:
 *  1. Make an empty list L and an empty list S;
 *  2. Put all the vertices with no predecessors in L;
 *  3. While L has items in it;
 *  3.1. Pop an item from L – n, and push it to S;
 *  3.2. For each vertex m adjacent to n;
 *  3.2.1. Remove (n, m);
 *  3.2.2. If m has no predecessors – push it to L
 */
class G {
  protected $_g = array(
    /**
     * adjacency matrix representation, 1 represents a path from a vertex
     *    A  B  C  D  E  F  G
     *  A
     *  B
     *  C
     *  D
     */
       // A  B  C  D  E  F  G
    array(0, 1, 1, 0, 0, 0, 0), // A
    array(0, 0, 0, 1, 0, 0, 0), // B
    array(0, 0, 0, 0, 1, 0, 0), // C
    array(0, 0, 0, 0, 1, 0, 0), // D
    array(0, 0, 0, 0, 0, 0, 1), // E
    array(0, 0, 0, 0, 0, 0, 1), // F
    array(0, 0, 0, 0, 0, 0, 0), // G
  );
  // 1. Make an empty list L and an empty list S;
  protected $_list = array(); // list L
  protected $_ts   = array(); // list S
  protected $_len  = null;

  public function __construct() {
    // 2. Put all the vertices with no predecessors in L;
    $this->_len = count($this->_g);
    // finds the vertices with no predecessors
    $sum = 0;
    for ($i = 0; $i < $this->_len; $i++) {
        for ($j = 0; $j < $this->_len; $j++) {
            $sum += $this->_g[$j][$i];
        }

        if (!$sum) {
            // append to list
            array_push($this->_list, $i);
        }
        $sum = 0;
    }
  }

  public function topologicalSort() {
    // 3. While L has items in it;
    while ($this->_list) {
      // 3.1. Pop an item from L – n, and push it to S;
      $t = array_shift($this->_list); // list L
      array_push($this->_ts, $t);     // list S
      // 3.2. For each vertex m adjacent to n;
      foreach ($this->_g[$t] as $key => $vertex) {
        if ($vertex == 1) {
          // 3.2.1. Remove (n, m);
          $this->_g[$t][$key] = 0;
          $sum = 0;
          for ($i = 0; $i < $this->_len; $i++) {
            $sum += $this->_g[$i][$key];
          }
          // 3.2.2. If m has no predecessors – push it to L
          if (!$sum) {
            array_push($this->_list, $key);
          }
        }
        $sum = 0;
      }
    }

    print_r($this->_ts);
  }
}