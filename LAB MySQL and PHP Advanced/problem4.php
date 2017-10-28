<?php
include 'DB.php';

$db = DB::getInstance();

$query = $db->prepare("
CALL `getStudentData`
");
$query->execute();

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    echo 'name: '.$row['name'].PHP_EOL;
    echo 'student number: '.$row['student_number'].PHP_EOL;
    echo 'course: '.$row['course_name'].PHP_EOL;
    echo '------------'.PHP_EOL;
}