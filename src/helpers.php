<?php

use Noisystate\SkippedAttributes\SkippedAttribute;
use Noisystate\SkippedAttributes\UnskippedAttributes;

if (!function_exists('skip_attribute')) {
    function skip_attribute()
    {
        return new SkippedAttribute();
    }
}

if (!function_exists('unskipped_attributes')) {
    function unskipped_attributes(array $array)
    {
        return UnskippedAttributes::from($array)->all();
    }
}
