<?php

require_once 'vendor/autoload.php';

$attributes = unskipped_attributes([
    'one' => 1,
    'two' => false ? 2 : skip_attribute(),
    'three' => true ? 3 : skip_attribute()
]);

if ($attributes == ['one' => 1, 'three' => 3]) {
    echo 'Test passed' . PHP_EOL;
} else {
    echo 'Test failed' . PHP_EOL;
}
