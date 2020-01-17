<?php
function squareOfSum(int $n) : int
{
    $total = 0;
    for ($i = 0; $i <= $n; $i++) {
        $total += $i;
    }
    return pow($total, 2);
}
function sumOfSquares(int $n) : int
{
    $total = 0;
    for ($i = 0; $i <= $n; $i++) {
        $total += pow($i, 2);
    }
    return $total;
}
function difference(int $n) : int
{
    return squareOfSum($n) - sumOfSquares($n);
}