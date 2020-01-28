<?php declare(strict_types=1);
function nucleotideCount(string $DNAStrand) : array
{
    $DNAStrand = mb_strtolower($DNAStrand);

    if (preg_match('/[^actg]/', $DNAStrand)) {
        throw new \InvalidArgumentException();
    }

    return [
        'a' => substr_count($DNAStrand, 'a'),
        'c' => substr_count($DNAStrand, 'c'),
        't' => substr_count($DNAStrand, 't'),
        'g' => substr_count($DNAStrand, 'g')
    ];
}
