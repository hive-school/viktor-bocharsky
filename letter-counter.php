<?php

$string = 'Test string';

$letters = str_split($string);

$counter = array();
foreach ($letters as $letter) {
    $letter = strtolower($letter);
    if (isset($counter[$letter])) {
        $counter[$letter]++;
    } else {
        $counter[$letter] = 1;
    }
}
unset($counter[' ']);
arsort($counter, SORT_NUMERIC);

foreach ($counter as $letter => $amount) {
    print "$letter => $amount". PHP_EOL;
}
