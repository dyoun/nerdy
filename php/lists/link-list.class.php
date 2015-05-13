<?php
/**
 * linked list is composed of a data element and reference to next node
 * basic class creates a node, append iterates until end and adds element
 * https://gist.github.com/zachflower/031e2f30f07e6c286ab8
 */

$list = new Linkedlist(0);
$list->append(1)->append(2)->append(3);
print_r($list);
$list->prepend(-1);
print_r($list);


echo "\n";

class Node {
  public $data;
  public $next;

  function __construct($data = null) {
    $this->data = $data;
    $this->next = null;
  }
}

class Linkedlist {
  public $head;
  public $count;

  function __construct($data = null) {
    $this->head = null;
    $this->count = 0;
    $this->prepend($data);
  }
  // add/replace to head of list
  public function prepend($data = null) {
    // create new head and set next to current head
    $head = new Node($data);
    if ($this->head !== null) {
      $head->next = $this->head;
    }
    // set current head to new head
    $this->head = &$head;
    $this->count++;

    return $this;
  }

  // add to tail of list
  public function append($data = null) {
    if ($this->head === null) {
      $this->prepend($data);
    }
    else { // create new tail, iterate until end
      $tail = new Node($data);
      $current = $this->head;
      while ($current->next !== null) {
        $current = $current->next;
      }
      // add to end
      $current->next = &$tail;
      $this->count++;

      return $this;
    }
  }

}