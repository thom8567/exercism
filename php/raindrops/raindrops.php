<?php
function raindrops(int $int) : string
{
    $result = '';

    if ($int % 3 === 0) {
        $result .= 'Pling';
    }
    if ($int % 5 === 0) {
        $result .= 'Plang';
    }
    if ($int % 7 === 0) {
        $result .= 'Plong';
    }

    return $result ? : $int ;
}

