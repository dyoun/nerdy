<?php

/**
 * Write code to remove duplicates from an unsorted linked list.
 * FOLLOW UP
 * How would you solve this problem if a temporary buffer is not allowed?
 */

	$items = array(2, 0, 1, 2, 3, 4);
	//dupe_list($items);

// iterate list and use a lookup table to keep track of dupes
function dupe_list($items) {
	$dupe_list = new SplDoublyLinkedList();
	$dupe_lookup = array();

	foreach ($items as $item) {
		$dupe_list->push($item);
	}
	// set iterator to first-in first-out
	$dupe_list->setIteratorMode(SplDoublyLinkedList::IT_MODE_FIFO);
	for ($dupe_list->rewind(); $dupe_list->valid(); $dupe_list->next()) {
		if (!empty($dupe_lookup[$dupe_list->current()])) {
			echo "dupe! " . $dupe_list->current()."({$dupe_list->key()})\n";
		}
		else {
			echo $dupe_list->current()."\n";
			$dupe_lookup[$dupe_list->current()] = $dupe_list->key();
		}
	}

	foreach ($dupe_lookup as $key => $value) {
		echo "remove element at index: " . $value;
		$dupe_list->offsetUnset($value);
	}

	for ($dupe_list->rewind(); $dupe_list->valid(); $dupe_list->next()) {
	  echo $dupe_list->current()."\n";
	}

}

