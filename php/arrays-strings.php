<?php
	/**
	 * Playing with Standard PHP Library (SPL)
	 * A doubly linked list example is below
	doublyLL();
	*/

	/* test if all characters in a string are unique
	
	$string = 'the quick brown fox jumped over the lazy dog';
  uniqueString($string);
	*/

  /* see if 2 strings are permutations of one another
	
	permutationString('dog', 'god');
	permutationString('listen', 'silent');
	permutationString('cat', 'tap');
	permutationString('school master', 'the Classroom');
	permutationString('Dormitory', 'Dirty    Room');
  */

	/** replace all spaces in a string with %20 */
	wsUrlEncode("Mr John Smith    ");
	

/**
 * Implement a method to perform basic string compression using the counts of repeated characters.
 * For example, the string aabcccccaaa would become a2blc5a3. If the "compressed" string would not 
 * become smaller than the original string, your method should return the original string.
 */


/**
 * replace all spaces in a string with %20 in place, length of string is known
 * and there is sufficient space at the end of the string, eg:
 *   "Mr John Smith    " -> "Mr%20John%20Smith"
 */
function wsUrlEncode($string) {
	// iterate chars until space, replace with %20
	// have to shift rest of characters down, expensive
	// whitespace from end / 3 = whitespace in string
	// @solution start from end of string with an index at end, when character is
	// encountered start shifting chars to end until space is encountered again
	// insert %20 until beginning of string is reached

	// instantiate our data struct
	$wsStr = new wsUrlStr($string);
	echo "'$string' {$wsStr->length} \n";
	// iterate from end of string until beginning
	$index = $wsStr->length;
	$start = 1;
	for ($i=$wsStr->length; $i >= 0; $i--) {
		echo "'" . $wsStr->array[$i] . "', ";
		// check for char
		if ($wsStr->array[$i] != ' ') {
			// start shifting to end index
			echo "Shifting char position: {$wsStr->array[$i]}($index)\n";
			$wsStr->array[$index] = $wsStr->array[$i];
			$start = 0; $index--;
			$wsStr->prnt(); echo "\n";
		}
		// when whitespace, insert %20
		elseif ($wsStr->array[$i] == ' ' && $start == 0) {
			echo "Inserting URL encoded whitespace:\n";
			foreach (array('0','2','%') as $encoded) {
				echo "$index:$encoded ";
				$wsStr->array[$index] = $encoded;
				$index--;
			}
			$start = 1;
			echo "\n" . $wsStr->prnt();

		}
	}
	echo 'Final String:';
	$wsStr->prnt();
	echo "\n";
}
class wsUrlStr {
	public $string;
	public $length;
	public $array;
	
	public function __construct($string) {
	  if (empty($string)) return;
		
		$this->string = $string;
		$this->array = str_split($string);
		$this->length = count($this->array)-1;
		
		return $this;
	}
	// print array char by char
	public function prnt() {
		echo "'";
		for ($i=0; $i<=$this->length; $i++) {
			echo $this->array[$i];
		}
		echo "'";
	}
}
	
/**
 * see if 2 strings are permutations of one another (anagram)
 * list of anagrams http://wordsmith.org/anagram/hof.html
 * @solution sort each string then iterate and compare each character
 */
function permutationString($string1, $string2) {
	if (empty($string1) || empty($string2)) return;

	// lowercase, string to array, and sort	
	$str1 = (new Str($string1))->sortToArray();
	$str2 = (new Str($string2))->sortToArray();

	// since whitespace doesn't count, find delta where chars start in array
	$str1->wsDelta();
	$str2->wsDelta();	
	
	// # of chars have to match to be an anagram
	if ($str1->charCount != $str2->charCount) return;

	// iterate and compare chars, if all same we have an anagram
	for ($i=0; $i<$str1->charCount; $i++) { // loop # of characters
		echo $str1->array[$i+$str1->wsDelta] . "=" . $str2->array[$i+$str2->wsDelta] . ", ";
		if ($str1->array[$i+$str1->wsDelta] != $str2->array[$i+$str2->wsDelta]) {
			echo "\nNon-Match! '$str1->orig' is not a permutation of '$str2->orig' \n\n";
			return;
		}
	}

	echo "\nMatch! '$str1->orig' is a permutation of '$str2->orig'\n\n";
	return;
}
/**
 * custom data structure for strings
 */
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