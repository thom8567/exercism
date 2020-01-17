<?php declare(strict_types=1);
function isIsogram(string $stringToTest) : bool
{
    //Instantiate the isogram validator class
    $validator = new IsogramValidator();

    //Return what is given back by the validateString function in the class
    return $validator->validateString($stringToTest);
}
class IsogramValidator
{
    public function validateString(string $stringToTest) : bool
    {
        $string = $this->toLowerCase($stringToTest);

        $string = $this->stripString($string);

        $characters = $this->toCharacters($string);

        return !$this->hasDuplicates($characters, $string);
    }
    private function stripString(string $string) : string
    {
        //Return a string without whitespace and hyphens
        return str_replace(['-', ' '], '', trim($string));
    }
    private function toLowerCase(string $string) : string
    {
        //Convert string to lowercase
        return mb_strtolower($string);
    }
    private function toCharacters(string $string) : array
    {
        //Return the string as an array of characters
        return preg_split('//u', $string, -1, PREG_SPLIT_NO_EMPTY);
    }
    private function hasDuplicates(array $characters, string $string) : bool
    {
        //Check if the string contains duplicates
        foreach ($characters as $key => $character) {
            if (mb_substr_count($string, $character) > 1) {
                return true;
            }
        }
        return false;
    }
}
