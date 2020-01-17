<?php
declare(strict_types=1);
function toDecimal(string $stringToConvert) : int
{

    if (strpos($stringToConvert, '3') !== false) {
        return 0;
    }

    $result = 0;

    $trinary = array_reverse(str_split($stringToConvert));

    foreach ($trinary as $power => $number) {
        $result += (int) ($number * pow(3, $power));
    }

    return $result;
}
