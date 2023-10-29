<?php
require_once "AbstractUniversity.php";
require_once "Subject.php";

class University extends AbstractUniversity
{
    /**
     * @var Subject[]
     */
    public $subjects = [];

    public function addSubject(string $code, string $name): Subject
    {       
            $subject = new Subject($code, $name);

            if ($subject->getCode() == $code){
                $this->subjects[] = $subject;
                return $subject;
        } else {
            throw new \Exception("Subject already exists!");
        }
    }

    public function getSubject(string $name)
    {
        foreach ($this->subjects as $subject){
            if ($subject->getName() == $name){
                return $subject;
            }
        }
    }

    public function addStudentOnSubject($subjectCode, Student $student)
    {   
        foreach ($this->subjects as $subject){
            if ($subject->getCode() == $subjectCode){
                if (in_array($student, $subject->getStudents())){
                    throw new \Exception("Student already exists!");
                } else {
                    $subject->addStudent($student->getname(), $student->getStudentNumber());
                }
            }
        }
    }

    public function getStudentsForSubject($subjectCode)
    {   
        $counter = 0;
        foreach ($this->subjects as $subject){
            if ($subject->getCode() == $subjectCode){
                $counter += count($subject->getStudents());
                return $counter;
            }
        } 
    }

    public function getNumberOfStudents(): int
    {
        $uniqueStudentIds = [];
        foreach ($this->subjects as $subject) {
            $students = $subject->getStudents();
    
            foreach ($students as $student) {
                $studentId = $student->getStudentNumber();
    
                if (!in_array($studentId, $uniqueStudentIds)) {
                    $uniqueStudentIds[] = $studentId;
                }
            }
        }
    
        return count($uniqueStudentIds);
    }
    
    public function print()
    {
        foreach ($this->subjects as $subject)
        {
            echo "-------------------------". "<br>" ;
            echo $subject->getName(). "<br>";
            echo "-------------------------". "<br>";

            foreach ($subject->getStudents() as $student)
            {
                echo $student->getName(). " - ". $student->getStudentNumber(). "<br>";
                echo "<br>";
            }
        }
    }

    public function deleteSubject(Subject $subjectToRemove)
    {
        $index = array_search($subjectToRemove, $this->subjects);
        if ($index !== false){
            unset($this->subjects[$index]);
            $this->subjects = array_values($this->subjects);
            echo "Subject successfully removed!". "<br>";
        } else {
            echo "Subject not found!";
        }
        return $this->subjects;
    }
}