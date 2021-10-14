<?php

namespace Noisystate\SkippedElements;

class UnskippedElements
{
    private $array;

    public function __construct(array $array)
    {
        $this->array = $array;
    }

    public static function from(array $array)
    {
        return new self($array);
    }

    public function all()
    {
        return array_filter($this->array, function ($element) {
            return !$element instanceof SkippedElement;
        });
    }
}
