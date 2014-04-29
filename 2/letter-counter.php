<?php

$string = ''; // string default value
switch (PHP_SAPI) {
    /* console case */
    case 'cli':
        while ( ! $string) {
            $string = stream_get_line(STDIN, 255, PHP_EOL); // Get string from console user input
            if ( ! $string) {
                print inputEmptyException();
            }
        }
        
        break;
    
    /* web browser case */
    default:
        if ( ! isset($_GET['s'])) {
            die('Pass your string by GET method with "s" key.');
        } elseif ( ! $string = $_GET['s']) {
            print inputEmptyException();
            die;
        }
        
        break;
}
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

function inputEmptyException() {
    return 'Input string can not be empty. Type something...'. PHP_EOL;
}
