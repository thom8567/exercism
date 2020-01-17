<?php declare(strict_types=1);
class Game
{
    public $score = 0;
    private $framePins = 10;
    private $throws = 2;

    public function roll(int $pinsKnockedDown) : void
    {
        if (10 < $pinsKnockedDown) {
            throw new \InvalidArgumentException('Cannot knock down more than 10 pins');
        }

        //decrease throws by 1
        $this->throws -= 1;

        //decrease frame pins by the number of pins that have been knocked down
        $this->framePins -= $pinsKnockedDown;

        if (0 === $this->framePins) {
            //spare or strike scored based on throws

        }

    }

    private function reset() : void
    {
        $this->framePins = 10;
        $this->throws = 2;
    }
}
