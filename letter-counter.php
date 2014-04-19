<?php

$string = 'Test string'; // test input string

$string = stream_get_line(STDIN, 255, PHP_EOL); // Get string from console user input
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
unset($counter['']); // remove empty string
unset($counter[' ']); // remove space
arsort($counter, SORT_NUMERIC); // reverse sort by frequency

/* printing letters with frequency */
foreach ($counter as $letter => $amount) {
    print "$letter => $amount". PHP_EOL;
}