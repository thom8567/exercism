<?php declare(strict_types=1);
function findFewestCoins(array $coinSet, int $changeToGive) : array
{
    if (in_array($changeToGive, $coinSet)) {
        return [$changeToGive];
    }
    if (0 === $changeToGive) {
        return [];
    }
    if (0 > $changeToGive) {
        throw new \InvalidArgumentException('Cannot make change for negative value');
    }
    if (min($coinSet) > $changeToGive) {
        throw new \InvalidArgumentException('No coins small enough to make change');
    }

    while ($changeToGive > 0) {
        fffff
    }

}