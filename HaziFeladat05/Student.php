<?php
/**
 * User: TheCodeholic
 * Date: 4/8/2020
 * Time: 10:40 PM
 */

/**
 * Class Student
 */
class Student
{
    public string $name;
    public string $studentNumber;
    public array $grades;

    public function __construct($name, $studentNumber)
    {
        $this->name = $name;
        $this->studentNumber = $studentNumber;
        $this->grades = [];
    }

    public function getname()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getStudentNumber()
    {
        return $this->studentNumber;
    }

    public function setStudentNumber($studentNumber)
    {
        $this->studentNumber = $studentNumber;
    }

    public function getGrades(){
        return $this->grades;
    }

    public function setGrades(string $subject, int $grade)
    {
        $this->grades[$subject] = $grade;
    }

    public function getAvgGrade()
    {
        $sum = 0.0;
    
        foreach ($this->grades as $grade){
            $sum += $grade;
        }
    
        if(count($this->grades) > 0){
            return $sum / count($this->grades); 
        } else {
            return 0;
        }
    }

    public function printGrades(){

        foreach ($this->grades as $key => $value){
            echo $key .": - ". $value;
        }
    }
}
