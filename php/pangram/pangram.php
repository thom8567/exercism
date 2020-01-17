<?php
function isPangram(string $sentence) : bool
{

    $alphabet = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];

    if (!$sentence) {
        return false;
    }

    $charactersOnly = str_split(strtolower(preg_replace('/[^a-zA-Z]/', '', $sentence)));

    foreach ($charactersOnly as $char) {
        if (false !== $result = array_search($char, $alphabet)) {
            unset($alphabet[$result]);
        }
    }

    return $alphabet ? false : true;
}
