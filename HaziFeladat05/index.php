<?php

require_once "Student.php";
require_once "Subject.php";
require_once "University.php";

$student1 = new Student("Misike", 1);
$student2 = new Student("Imre", 2);
$student3 = new Student("Zsolt", 3);
$student4 = new Student("Zita", 4);
$student5 = new Student("Aniko", 5);

$Sapientia = new University();

$Sapientia->addSubject("999", "deletableSubject");

$Sapientia->addSubject("101", "PHP");
$Sapientia->deleteSubject($Sapientia->getSubject("deletableSubject"));
print_r($Sapientia). "<br>";

$Sapientia->addStudentOnSubject("101", $student1);
$Sapientia->addStudentOnSubject("101", $student2);
$Sapientia->addStudentOnSubject("101", $student3);
$Sapientia->addStudentOnSubject("101", $student4);
$Sapientia->addStudentOnSubject("101", $student5);

echo "Number of students studying PHP: ". $Sapientia->getStudentsForSubject("101"). "<br>";

$Sapientia -> getSubject("PHP")->deleteStudent($student1);
echo "Number of students studying PHP: ". $Sapientia->getStudentsForSubject("101"). "<br>";


$Sapientia->addSubject("102", "Python");

$Sapientia->addStudentOnSubject("102", $student1);
$Sapientia->addStudentOnSubject("102", $student4);
$Sapientia->addStudentOnSubject("102", $student5);


echo "Number of students studying Python: ". $Sapientia->getStudentsForSubject("102"). "<br>";

$Sapientia->addSubject("103", "C#");

$Sapientia->addStudentOnSubject("103", $student1);
$Sapientia->addStudentOnSubject("103", $student3);

echo "Number of students studying C#: ". $Sapientia->getStudentsForSubject("103"). "<br>";
echo "Total number of students in the university: ". $Sapientia->getNumberOfStudents(). "<br>";

print_r($student1->getGrades());
echo "<br>";
print_r($student1->getAvgGrade());
echo "<br>";

$student1->setGrades("PHP", 8);
$student1->setGrades("Python", 10);
$student1->setGrades("C#", 4);

$student2->setGrades("PHP", 9);
$student2->setGrades("Python", 9);
$student2->setGrades("C#", 10);

$student3->setGrades("PHP", 4);
$student3->setGrades("Python", 7);
$student3->setGrades("C#", 6);

$Sapientia->print();

$students = [];

$students[] = $student1;
$students[] = $student2;
$students[] = $student3;
$students[] = $student4;
$students[] = $student5;

function sortByAverageGrade($students) {
    $averageGrades = [];
    foreach ($students as $student) {
        $averageGrades[$student->getName()] = $student->getAvgGrade();
    }

    arsort($averageGrades);

    $sortedStudents = [];
    foreach ($averageGrades as $studentName => $averageGrade) {
        foreach ($students as $student) {
            if ($student->getName() === $studentName) {
                $sortedStudents[] = $student;
                break;
            }
        }
    }
    return $sortedStudents;
}

$sortedStudents = sortByAverageGrade($students);

echo "Students sorted by average grade:\n";
foreach ($sortedStudents as $student) {
    echo $student->getName() . ": " . $student->getAvgGrade() . "\n";
}

