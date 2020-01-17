<?php

// Implementation note:
// --------------------
// If the argument to parse_binary isn't a valid binary value the
// function should raise an \InvalidArgumentException
// with a meaningful error message.

function parse_binary($binary)
{
    assertBinaryIsValid($binary);

    $binaryArray = str_split(strrev($binary));

    $decimal = 0;

    foreach ($binaryArray as $power => $number) {
        $decimal += $number * pow(2, $power);
    }
    return $decimal;
}
function assertBinaryIsValid($binary)
{
    if (!empty(str_replace(['0', '1'], '', $binary))) {
        throw new \InvalidArgumentException('Invalid binary string');
    }
}
