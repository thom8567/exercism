<?php
function detectAnagrams(string $anagramOf, array $arrayToSearch) : array
{

    $result = [];

    if (count($arrayToSearch) < 2) {
        return [];
    }

    foreach ($arrayToSearch as $word) {
        if (count_chars(mb_strtolower($word), 1) !== count_chars(mb_strtolower($anagramOf), 1)) {
            continue;
        }
        if (mb_strtolower($word) === mb_strtolower($anagramOf)) {
            continue;
        }
        $result[] = $word;
    }

    return $result;

}