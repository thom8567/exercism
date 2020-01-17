<?php declare(strict_types=1);

function solve(string $board) : string
{

    $grid = explode("\n", $board);

    var_dump($grid);

    foreach ($grid as $index => $gridPart) {
        if (empty($gridPart)) {
            unset($grid[$index]);
            continue;
        }
        if (preg_match('/[^\*\+\-\| ]/', $gridPart)) {
            throw new \InvalidArgumentException('Unknown characters');
        }
        if (preg_match('/[\+]/', $gridPart) && 2 !== substr_count($gridPart, '+')) {
            throw new \InvalidArgumentException('Not enough corners');
        }
        if (4 > strlen($gridPart)) {
            throw new \InvalidArgumentException('Not enough squares');
        }

    }

    return $board;
}
