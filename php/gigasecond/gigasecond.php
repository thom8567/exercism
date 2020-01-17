<?php
declare(strict_types=1);
function from(DateTimeImmutable $date)
{
    $seconds = pow(10, 9);

    return $date->modify('+' . $seconds . 'seconds');
}