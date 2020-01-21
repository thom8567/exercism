<?php declare(strict_types=1);

function calculate(string $calculation) : int
{
    if (!preg_match('/[0-9]/', $calculation)) {
        throw new \InvalidArgumentException();
    }

    $calculation = str_replace('What is ', 'return ', $calculation);
    $calculation = str_replace('by ', '', $calculation);
    $calculation = str_replace('?', ';', $calculation);
    $calculation = explode(' ', $calculation);

    foreach($calculation as $index => $word) {
        if ('plus' === $word) {
            $calculation[$index] = '+';
        }
        if ('minus' === $word) {
            $calculation[$index] = '-';
        }
        if ('divided' === $word) {
            $calculation[$index] = '/';
        }
        if ('multiplied' === $word) {
            $calculation[$index] = '*';
        }
    }

    ksort($calculation);

    var_dump($calculation);

    $calculation = implode(' ', $calculation);

    var_dump($calculation);

    return eval($calculation);
}
