<?php declare(strict_types=1);
class Triangle
{
    private $triangleSides = [];

    /**
     * Triangle constructor.
     * @param int | float $sideA
     * @param int | float $sideB
     * @param int | float $sideC
     */
    public function __construct(
        $sideA = 0,
        $sideB = 0,
        $sideC = 0
    )
    {
        $this->triangleSides = [$sideA, $sideB, $sideC];
    }

    /**
     * @return string
     * @throws Exception
     */
    public function kind() : string
    {
        $this->assertValidTriangle();

        if (1 === count(array_unique($this->triangleSides))) {
            return 'equilateral';
        }

        if (2 === count(array_unique($this->triangleSides))) {
            return 'isosceles';
        }

        if (3 === count(array_unique($this->triangleSides))) {
            return 'scalene';
        }
    }

    /**
     * @throws Exception
     */
    private function assertValidTriangle() : void
    {
        if (in_array(0, $this->triangleSides)) {
            throw new \Exception();
        }

        sort($this->triangleSides);

        if ($this->triangleSides[0] + $this->triangleSides[1] < $this->triangleSides[2]) {
            throw new \Exception();
        }
    }
}
