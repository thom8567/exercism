<?php declare(strict_types=1);

function recognize(array $input) : string
{
    assertValidInput($input);
}

function assertValidInput(array $input) : void
{
    if (count($input) < 3) {
        throw new InvalidArgumentException();
    }

    foreach ($input as $row) {
        if (0 === 3 % strlen($row)) {
            echo 'Failed on row length';
            throw new InvalidArgumentException();
        }
    }
}

function convertCharacterToString(array $character) : string
{
    $library = [
        0 => [
            " _ ",
            "| |",
            "|_|",
            "   "
        ],
        1 => [
            "   ",
            "  |",
            "  |",
            "   "
        ],
        2 => [
            " _ ",
            " _|",
            "|_ ",
            "   "
        ],
        3 => [
            " _ ",
            " _|",
            " _|",
            "   "
        ],
        4 => [
            "   ",
            "|_|",
            "  |",
            "   "
        ],
        5 => [
            " _ ",
            "|_ ",
            " _|",
            "   "
        ],
        6 => [
            " _ ",
            "|_ ",
            "|_|",
            "   "
        ],
        7 => [
            " _ ",
            "  |",
            "  |",
            "   "
        ],
        8 => [
            " _ ",
            "|_|",
            "|_|",
            "   "
        ],
        9 => [
            " _ ",
            "|_|",
            " _|",
            "   "
        ]
    ];

    if (!array_search($character, $library)) {
        return '?';
    }

    return array_search($character, $library);
}