<?php declare(strict_types=1);
function isValid(string $number) : bool
{
    //Instantiating the number validator class
    $validator = new numberValidator();

    //Return what is given back to us by the validateNumber function
    return $validator->validateNumber($number);
}
class numberValidator
{
    public function validateNumber(string $number) : bool
    {
        $number = $this->removeWhitespace($number);

        //If number contains punctuation then return false as the number is not valid
        if (!$this->checkForNonDigits($number)) {
            return false;
        }

        //If checkLength returns false then return false from here as number is not valid
        if (!$this->checkLength($number)) {
            return false;
        }

        //If luhnCalculation returns false then return false from here as number is not valid
        if (!$this->luhnCalculation($number)) {
            return false;
        }

        //All other checks must have passed so return true as number is valid
        return true;
    }
    private function removeWhitespace(string $number) : string
    {
        $number = trim($number);
        $number = str_replace(' ', '', $number);
        return $number;
    }
    private function checkForNonDigits(string $number) : bool
    {
        return false == preg_match('/[^0-9]/', $number);
    }
    private function checkLength(string $number) : bool
    {
        //Calculate length of number
        $lengthOfNumber = strlen($number);

        //Valid number is more than 1 digit in length
        return $lengthOfNumber > 1;
    }
    private function luhnCalculation(string $number) : bool
    {
        //Split number into an array
        $splitNumber = array_reverse(str_split($number));

        for ($i = 1; $i < count($splitNumber); $i += 2) {
            $temp = $splitNumber[$i] * 2;

            if ($temp > 9) {
                $temp -= 9;
            }

            $splitNumber[$i] = $temp;
        }

        $sumOfDigits = array_sum($splitNumber);

        if ($sumOfDigits % 10 !== 0) {
            return false;
        }
        return true;
    }
}
