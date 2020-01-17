<?php declare(strict_types=1);
class Robot {
    public const DIRECTION_NORTH    = 'north';
    public const DIRECTION_SOUTH    = 'south';
    public const DIRECTION_EAST     = 'east';
    public const DIRECTION_WEST     = 'west';

    public $position;
    public $direction;

    /**
     * Robot constructor.
     * @param array $position
     * @param string $direction
     */
    public function __construct(
        array $position,
        string $direction
    )
    {
        $this->position = $position;
        $this->direction = $direction;
    }

    /**
     * Translate instructions to new position and direction
     * @param string $setOfInstructions
     */
    public function instructions(string $setOfInstructions) : void
    {
        if (preg_match('/[^ALR]/', $setOfInstructions)) {
            throw new \InvalidArgumentException('Invalid instruction given');
        }

        $splitInstructions =  str_split($setOfInstructions);

        foreach ($splitInstructions as $instruction) {
            if ('A' === $instruction) {
                $this->advance();
            }
            if ('L' === $instruction) {
                $this->turnLeft();
            }
            if ('R' === $instruction) {
                $this->turnRight();
            }
        }
    }

    /**
     * @return Robot
     */
    public function turnRight() : Robot
    {
        $directionTranslation = [
            'north' => 'east',
            'east'  => 'south',
            'south' => 'west',
            'west'  => 'north'
        ];

        $this->direction = $directionTranslation[$this->direction];

        return $this;
    }

    /**
     * @return Robot
     */
    public function turnLeft() : Robot
    {
        $directionTranslation = [
            'north' => 'west',
            'west'  => 'south',
            'south' => 'east',
            'east'  => 'north'
        ];

        $this->direction = $directionTranslation[$this->direction];

        return $this;
    }

    /**
     * @return Robot
     */
    public function advance() : Robot
    {
        if (self::DIRECTION_NORTH === $this->direction) {
            $this->position[1] += 1;
        }
        if (self::DIRECTION_SOUTH === $this->direction) {
            $this->position[1] -= 1;
        }
        if (self::DIRECTION_EAST === $this->direction) {
            $this->position[0] += 1;
        }
        if (self::DIRECTION_WEST === $this->direction) {
            $this->position[0] -= 1;
        }
        return $this;
    }
}
