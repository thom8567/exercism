<?php declare(strict_types=1);
class Clock
{
    private $hours;
    private $minutes;

    /**
     * Clock constructor.
     * @param int $hours
     * @param int $minutes
     * @throws Exception
     */
    public function __construct(
        int $hours = 0,
        int $minutes = 0
    )
    {
        $this->hours = $hours;
        $this->minutes = $minutes;

        $currentTime = $this->getTime();
        $this->saveTime($currentTime);
    }

    /**
     * @return DateTime
     * @throws Exception
     */
    private function getTime() : DateTime
    {
        $currentTime = new DateTime();

        $currentTime->setTime($this->hours, $this->minutes);

        return $currentTime;
    }

    /**
     * @param $currentTime
     */
    private function saveTime($currentTime) : void
    {
        $this->hours = (int) $currentTime->format('H');
        $this->minutes = (int) $currentTime->format('i');
    }

    /**
     * @return string
     * @throws Exception
     */
    public function __toString() : string
    {
        return $this->getTime()->format('H:i');
    }

    /**
     * @param int $minutes
     * @return $this
     * @throws Exception
     */
    public function add(int $minutes) : self
    {
        if ($minutes < 0) {
            return $this->subtract($minutes * -1);
        }

        $currentTime = $this->getTime();

        $currentTime->add(new DateInterval('PT' . $minutes . 'M'));

        $this->saveTime($currentTime);

        return $this;
    }

    /**
     * @param int $minutes
     * @return $this
     * @throws Exception
     */
    public function subtract(int $minutes) : self
    {
        $currentTime = $this->getTime();

        $currentTime->sub(new DateInterval('PT' . $minutes . 'M'));

        $this->saveTime($currentTime);

        return $this;
    }
}
