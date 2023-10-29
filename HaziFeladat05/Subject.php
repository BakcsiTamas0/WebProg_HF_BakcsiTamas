<?php
/**
 * User: TheCodeholic
 * Date: 4/8/2020
 * Time: 10:16 PM
 */

/**
 * Class Subject
 */
class Subject
{
    public string  $code;
    public string $name;
    /**
     * @var Student[]
     */
    public array $students = [] ;

    // TODO Generate getters and setters
    // TODO Generate constructor for all attributes. $students argument of the constructor can be empty

    public function __construct(string $code, string $name, array $students = [])
    {
        $this->code = $code;
        $this->name = $name;
        $this->students = $students;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCodde($code)
    {
        $this->code=$code;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name=$name;
    }

    public function getStudents()
    {
        return $this->students;
    }

    public function setStudents($students)
    {
        $this->students=$students;
    }

    //ToDo
    /**
     * Method accepts student name and number, creates instance of the Student class, adds inside $students array
     * and returns created instance
     *
     * @param string $name
     * @param string $studentNumber
     * @return \Student
     */
    public function addStudent(string $name, string $studentNumber): Student
    {
            $student = new Student($name, $studentNumber);
            $this->students[] = $student;
            return $student;
    }
    
    private function isStudentExists(string $studentNumber): bool
    {
        foreach ($this->students as $student) {
            if ($student->getStudentNumber() == $studentNumber) {
                return true;
            }
        }
        return false;
    }

    public function deleteStudent(Student $studentToDelete)
{
    foreach ($this->students as $key => $student){
        if ($student->getStudentNumber() == $studentToDelete->getStudentNumber()){
            unset($this->students[$key]);
            echo "Student successfully removed!". "<br>";
            return $this->students;
        }
    }
    echo "Student not found!";
    return $this->students;
}
}
