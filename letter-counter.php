<?php

$string = 'Test string'; // test input string

$letters = str_split($string); // split string to array by letters

/* counting letter frequency with loop */
$counter = array();
foreach ($letters as $letter) {
    $letter = strtolower($letter);
    if (isset($counter[$letter])) {
        $counter[$letter]++;
    } else {
        $counter[$letter] = 1;
    }
}
unset($counter[' ']); // remove spaces
arsort($counter, SORT_NUMERIC); // reverse sort by frequency

/* printing letters with frequency */
foreach ($counter as $letter => $amount) {
    print "$letter => $amount". PHP_EOL;
}