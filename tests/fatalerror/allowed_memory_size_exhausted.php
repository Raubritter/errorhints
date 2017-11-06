<?php

$b = null;

/**
 * @return string
 */
function make_dummy_data()
{
    return str_repeat( "Hello|", 11423342 );
}

$a = make_dummy_data();

$data = explode( '|', $a ); // comment this after narrowing down that a lot of memory is being used here
//$data = array(); // uncomment this and memory usage will drop

$buffer = array();

foreach( $data as $key => $item ){
    $buffer[] = $item;
}
//
//PHP: Fatal Error: Allowed Memory Size of 8388608 Bytes Exhausted - 8 MB
//PHP: Fatal Error: Allowed Memory Size of 16777216 Bytes Exhausted - 16 MB
//PHP: Fatal Error: Allowed Memory Size of 33554432 Bytes Exhausted - 32 MB
//PHP: Fatal Error: Allowed Memory Size of 67108864 Bytes Exhausted - 64 MB
//PHP: Fatal Error: Allowed Memory Size of 134217728 Bytes Exhausted - 128 MB
//PHP: Fatal Error: Allowed Memory Size of 268435456 Bytes Exhausted - 256 MB
//PHP: Fatal Error: Allowed Memory Size of 536870912 Bytes Exhausted - 512 MB
//PHP: Fatal Error: Allowed Memory Size of 1073741824 Bytes Exhausted - 1 GB