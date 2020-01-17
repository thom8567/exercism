<?php declare(strict_types=1);
class School {

    private $students = [];

    public function add(string $name, int $grade) : void
    {
        $this->students[$grade][] = $name;
    }
    public function grade(int $grade) : array
    {
        if (empty($this->students[$grade])) {
            return [];
        }
        return $this->students[$grade];
    }
    public function studentsByGradeAlphabetical() : array
    {
        //Sort array by key, maintaining key to data correlations
        ksort($this->students);

        foreach ($this->students as &$array) {
            sort($array);
        }

        return $this->students;
    }
}
