<?php
function wordCount(string $stringToCount) : array
{
    $wordsToCount = getUniqueWords($stringToCount);

    return $result = array_count_values($wordsToCount);
}
function getUniqueWords(string $string) : array
{
    $arrayedString = explode(' ', mb_strtolower(preg_replace('/[^a-zA-Z0-9]/', ' ', $string)));

    return $wordsToCount = array_filter($arrayedString);
}
