<?php
function toRna(string $dna) : string
{
    $splitDNA = str_split(mb_strtoupper($dna));

    try {
        $result = array_map('convertComponent', $splitDNA);
    } catch (Exception $error) {
        return $error;
    }

    return implode('', $result);
}
function convertComponent(string $component) : string
{
    $dictionary = [
        'G' => 'C',
        'C' => 'G',
        'T' => 'A',
        'A' => 'U'
    ];
    if (!$dictionary[$component]) {
        new \ErrorException('Component given is not valid');
    }
    return $dictionary[$component];
}
