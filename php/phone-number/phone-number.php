<?php declare(strict_types=1);
class PhoneNumber
{
    /**
     * @var string
     */
    private $phoneNumber;

    /**
     * PhoneNumber constructor.
     * @param string $phoneNumber
     */
    public function __construct(string $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return string
     */
    public function number() : string
    {
        $this->assertValidPhoneNumber($this->unformattedPhoneNumber);
    }

    private function assertValidPhoneNumber(string $phoneNumber) : void
    {
        if (preg_match('(?<extra>[^0-9\(\)\-\+\. ])', $phoneNumber, $matches)) {
            if (preg_match('/[a-zA-Z]/', $matches['extra'])) {
                throw new \InvalidArgumentException('Letters are not permitted');
            }
            if (preg_match('/[^a-zA-Z]', $matches['extra'])) {
                throw new \InvalidArgumentException('Extra punctuation is not permitted');
            }
        }
    }
}
