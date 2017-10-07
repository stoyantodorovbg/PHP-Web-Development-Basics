<?php

include 'Human.php';
include 'Student.php';
include 'Worker.php';

$studentInp = trim(fgets(STDIN));
$studentArr = explode(' ', $studentInp);
$student = new Student($studentArr[0], $studentArr[1], $studentArr[2]);

$workerInp = trim(fgets(STDIN));
$workerArr = explode(' ', $workerInp);
$worker = new Worker($workerArr[0], $workerArr[1],$workerArr[2], $workerArr[3]);

echo $student;
echo $worker;