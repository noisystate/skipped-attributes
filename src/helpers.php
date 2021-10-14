<?php

use Noisystate\SkippedElements\SkippedElement;
use Noisystate\SkippedElements\UnskippedElements;

if (!function_exists('skip_element')) {
    function skip_element()
    {
        return new SkippedElement();
    }
}

if (!function_exists('unskipped_elements')) {
    function unskipped_elements(array $array)
    {
        return UnskippedElements::from($array)->all();
    }
}
