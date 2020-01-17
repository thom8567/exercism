<?php

function distance(string $strandA, string $strandB) : int
{
    if (strlen($strandA) !== strlen($strandB)) {
        throw new InvalidArgumentException('DNA strands must be of equal length.');
    }

    $count = 0;

    foreach (str_split($strandA) as $index => $char) {
        $count += (int) ($char !== $strandB[$index]);
    }
    return $count;
}



