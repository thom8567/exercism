<?php
function isLeap(int $yearToTest) : bool
{
    //if year is less than or equal to 0 or does not divide evenly by 4 then return false
    if ($yearToTest <= 0 || $yearToTest % 4 !== 0) {
        return false;
    }
    //if year is divisible by 100 but not divisible by 400 then return false
    if ($yearToTest % 100 === 0 && $yearToTest % 400 !== 0) {
        return false;
    }
    //other tests must have passed to get here so return true
    return true;
}
