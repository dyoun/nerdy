<?php

// stack http://www.sitepoint.com/php-data-structures-1/

// SPL stack class
$stack = new SplStack();
//$stack->setIteratorMode(SplDoublyLinkedList::IT_MODE_DELETE| SplDoublyLinkedList::IT_MODE_FIFO);
$stack->push('0');
$stack->push('1');
$stack->push('2');

// FILO
foreach($stack as $element) {
  echo $element . "\n";
}

// FIFO
// bottom-up traversal
//$stack->setIteratorMode(SplDoublyLinkedList::IT_MODE_FIFO|SplDoublyLinkedList::IT_MODE_KEEP);

// SQL queue class
$queue = new SplQueue();
$queue->enqueue('0');
$queue->enqueue('1');
$queue->enqueue('2');

echo $queue->dequeue() . " " . $queue->dequeue() . " " . $queue->dequeue() . "\n";