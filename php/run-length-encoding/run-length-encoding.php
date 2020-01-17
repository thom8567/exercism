<?php declare(strict_types=1);

function encode(string $input) : string
{
    try {
        assertValidString($input);
    } catch (Exception $e) {
        echo 'Error: ' . $e;
    }

    if (empty($input)) {
        return $input;
    }

    $encodedString = '';

    while (!empty($input)) {
        $firstCharacter = substr($input, 0, 1);

        if (!preg_match('/^(?<letters>' . $firstCharacter . '+)/', $input, $matches)) {
            throw new \Exception('error');
        }

        $length = strlen($matches[0]);

        $encodedString .= ($length > 1 ? $length : '') . $firstCharacter;

        $input = substr($input, $length);
    }

    return $encodedString;
}

function decode(string $input) : string
{
    try {
        assertValidString($input);
    } catch (Exception $e) {
        echo 'Error: ' . $e;
    }

    $decodedString = '';

    while (!empty($input)) {
        preg_match('/^(?<count>[0-9]+)?(?<letter>[A-Za-z ])/', $input, $matches);
        $input = substr($input, strlen($matches[0]));
        //count is the number before the letter, denoting how many characters there are
        //when only one character is there, there is no number, meaning that count
        //would be 0.
        //int then keeps this as 0 and str_repeat would repeat the character 0 times
        //the ternary then checks if it is 0, and sets the count to one instead which is
        //what should happen when only one character is present
        $decodedString .= str_repeat($matches['letter'], (int) ($matches['count'] ?: 1));
    }

    return $decodedString;
}

function assertValidString(string $input) : void
{
    if (0 !== preg_match('/[^A-Za-z0-9 ]/', $input)) {
        throw new \ErrorException('Contains invalid characters');
    }
}
