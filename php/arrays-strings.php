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
	permutationString('cat', 'tap');
	permutationString('school master', 'the Classroom');
	permutationString('Dormitory', 'Dirty    Room');

	//doublyLL();

/**
 * see if 2 strings are permutations of one another (anagram)
 * list of anagrams http://wordsmith.org/anagram/hof.html
 * @solution sort each string then iterate and compare each character
 */
function permutationString($string1, $string2) {
	if (empty($string1) || empty($string2)) return;

	// lowercase, string to array, and sort
	/*
	$string1Array = str_split(strtolower($string1));
	sort($string1Array);
	$string2Array = str_split(strtolower($string2));
	sort($string2Array);
	*/
	
	$str1 = (new Str($string1))->sortToArray();
	$str2 = (new Str($string2))->sortToArray();

	// since whitespace doesn't count, find delta where chars start in array
	$str1->wsDelta();
	$str2->wsDelta();	
	
	// # of chars have to match to be an anagram
	if ($str1->charCount != $str2->charCount) return;

	// iterate and compare chars, if all same we have an anagram
	for ($i=0; $i<$str1->charCount; $i++) {
		echo $str1->array[$i+$str1->wsDelta] . "=" . $str2->array[$i+$str2->wsDelta] . ", ";
		if ($str1->array[$i+$str1->wsDelta] != $str2->array[$i+$str2->wsDelta]) {
			echo "\nNon-Match! '$str1->orig' is not a permutation of '$str2->orig' \n\n";
			return;
		}
	}

	echo "\nMatch! '$str1->orig' is a permutation of '$str2->orig'\n\n";
	return;
}
class Str {
	public $orig;
	public $array;
	public $length;
	public $wsDelta;
	public $charCount;
	
	public function __construct($orig) {
		$this->orig = strtolower($orig);

		return $this;
	}
	
	public function sortToArray() {
		$this->array = str_split($this->orig);
		$this->length = count($this->array);
		sort($this->array);

		return $this;
	}
	/**
	 * return position of non whitespace char of a string array
	 */
	public function wsDelta() {
		foreach ($this->array as $char) {
			if ($char == ' ') {
				$this->wsDelta++;
			} else {
				//echo $delta . "\b\n";
				$this->charCount = $this->length - $this->wsDelta;
				return $this;
			}
		}
	}	
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

/**
 * linked list eg
 */
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