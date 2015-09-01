<?php
/**
 * Convert the column headings of a spreadsheet, eg, A, B, AA, BB .. Z, ZZ, etc,
 * to an integer.
 *
 * Corresponding values of chars to ints are; A=>1..Z=>26, ie, AA=>11..ZZ=>2626
 *
 * How would code be tested?
 */

$strings = array(
  'a', //1
  'z', //26
  'az', //126
  'zb',
  'b',
  'aa',
  'bb',
  'aaa',
  'bbb',
  'zzz', //262626
);

foreach ($strings as $string) {
  echo $string . " -> " . strToInt($string) . "\n";
}

function strToInt($string) {
  $int = '';

  $chars = str_split($string);
  foreach ($chars as $char){
    // return ASCII character value and subtract by delta
    $int .= ord($char)-96;
    echo $int . " * ";
  }

  return $int;
}