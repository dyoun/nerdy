<?php

$stringArray = array('a', 'g', 'u', '!', 'z', 'e', ' ', 'b', '&');
foreach ($stringArray as $char) {
  echo $char . ' ';
}
echo "\n";

// white space, punctation are ordered before letters
sort($stringArray);
foreach ($stringArray as $char) {
  echo $char . ' ';
}
echo "\n";