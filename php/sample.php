<?php
	/**
	 * Playing with Standard PHP Library (SPL)
	 * A doubly linked list example is below
	 */
	//$string = 'the quick brown fox jumped over the lazy dog';
  //uniqueString($string);

  // see if 2 strings are permutations of one another
	permutationString('dog', 'god');
	permutationString('listen', 'silent');
	permutationString('school master', 'the Classroom');

	//doublyLL();

/**
 * see if 2 strings are permutations of one another (anagram)
 * list of anagrams http://wordsmith.org/anagram/hof.html
 * @solution sort each string then iterate and compare each character
 */
function permutationString($string1, $string2) {
	if (empty($string1) || empty($string2)) return;
		
	$string1Array = str_split(strtolower($string1));
	sort($string1Array);
	$string2Array = str_split(strtolower($string2));
	sort($string2Array);
	
	if (count($string1) != count($string2)) return;
	
	for ($i = 0, $length = count($string1Array); $i < $length; $i++) {
		if ($string1Array[$i] != $string2Array[$i]) {
			echo "$string1 is not a permutation of $string2 \n";
			return; 
		}
		echo $string1Array[$i] . "=" . $string2Array[$i] . ", ";
	}

	echo "\nMatch! $string1 is a permutation of $string2\n";
	//echo print_r($string1Array) . " is a permutation of " . print_r($string2Array) . "\n";
	return; 		
}

/**
 * given a string, determine if all characters are unique - whitespace not included
 * @solution iterate sorted string array and compare all chars
 */
function uniqueString($string){
	if (empty($string)) return;
		
	$stringArray = str_split($string);
	sort($stringArray);
	foreach ($stringArray as $char) {
		if ($char != ' ' && ($prev_char == $char)) {
			echo $string . ' string is not unique "' . $prev_char . '" "' . $char . "\"\n";
			return;
		}
		//print $char;
		$prev_char = $char;
	}
	print "\n";
}
function doublyLL() {
	// basic FIFO
	$dblyList = new SplDoublyLinkedList();
	// push
	$dblyList->push('1,5');
	$dblyList->push('6,10');
	// peek at top value
	echo 'Top: ' . $dblyList->top() . "\n";
 	$dblyList->pop();
	echo '2nd: ' . $dblyList->top() . "\n";
}