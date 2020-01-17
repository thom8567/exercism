<?php declare(strict_types=1);
class Series
{
    /**
     * @var int
     */
    private $series;

    /**
     * Series constructor.
     * @param string|int $series
     * @throws Exception
     */
    public function __construct($series)
    {
        if (is_int($series)) {
            $series = (string) $series;
        }

        if (!is_string($series)) {
            throw new \Exception('Series is not an int');
        }

        if (preg_match('/[^0-9]/', $series)) {
            throw new \InvalidArgumentException('Non numeric character found');
        }

        $this->series = $series;
    }

    /**
     * @param int $numberOfDigitsToUse
     * @return int
     */
    public function largestProduct(int $numberOfDigitsToUse) : int
    {
        $this->assertValidNumberOfDigits($numberOfDigitsToUse);

        if ($numberOfDigitsToUse === 0) {
            return 1;
        }

        $largestProduct = 0;
        for ($i = 0; $i <= strlen($this->series) - $numberOfDigitsToUse; $i++) {
            $largestProduct = max($largestProduct, array_product(str_split(substr($this->series, $i, $numberOfDigitsToUse))));
        }
        return $largestProduct;
    }

    /**
     * @param int $numberOfDigitsToUse
     */
    private function assertValidNumberOfDigits(int $numberOfDigitsToUse) : void
    {
        if (strlen($this->series) < $numberOfDigitsToUse) {
            throw new \InvalidArgumentException('Span cannot be longer than string length');
        }

        if (0 > $numberOfDigitsToUse) {
            throw new \InvalidArgumentException('Span cannot be less than 0');
        }

        if (empty($this->series) && 0 < $numberOfDigitsToUse) {
            throw new \InvalidArgumentException('Unable to perform action on empty input');
        }
    }
}
