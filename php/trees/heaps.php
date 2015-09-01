<?php

# max heap
$max = new SplMaxHeap();
$max->insert(4);
$max->insert(5);
$max->insert(6);
$max->insert(7);

# max
echo 'root/max: ' . $max->top() . "\n";

# return root element
echo 'extract: ' . $max->extract() . "\n";

# insert/compare
//echo 'insert 10: ' . $max->compare(10, $max->top()) . "\n";

# empty
echo 'valid: ' . $max->valid() . "\n";

while (!$max->isEmpty()) {
  echo $max->current() . "\n";
  $max->next();
}

# reset to root
$max->rewind();
echo 'root/max: ' . $max->top() . "\n";

# iterate BFS
foreach ($max as $number) {
  echo $number . "\n";
}
