<?php
include 'DB.php';

while(true) {
    $input = trim(fgets(STDIN));
    if ($input == 'edn') {
        break;
    }
    $inputArr = explode(' ', $input);

    $db = DB::getInstance();

    $query = $db->prepare("
SELECT *
FROM `students`
WHERE `student_number` = \"$inputArr[2]\"
");
    $query->execute();

    if ($query->rowCount() > 0) {
        throw new Exception('Already there is a student with such student number!');
    } else {
        $query = $db->prepare("
        INSERT INTO `students`
        (`first_name`, `last_name`, `student_number`)
        VALUES (?,?,?)
        ");
        $query->execute([$inputArr[0], $inputArr[1], $inputArr[2]]);

        $query2 = $db->prepare("
SELECT `student_id`
FROM `students`
WHERE `student_number` = \"$inputArr[2]\"
");
        $query2->execute();

        $query = $db->prepare("
SELECT *
FROM `courses`
WHERE `course_name` = \"$inputArr[3]\"
");
        $query->execute();

        $course_id = '';
        foreach($query as $i => $iv) {
            $course_id = $iv['course_id'];
        }

        if ($query->rowCount() > 0) {
            $student_id = '';
            foreach($query2 as $i => $iv) {
                $student_id = $iv['student_id'];
            }

            $query1 = $db->prepare("
            INSERT INTO `student_subscriptions`
            (`student_id`, `course_id`)
            VALUES (?,?)
            ");
            $query1->execute([$student_id, $course_id]);
        } else {
            throw new Exception('Already there is a student with such student number!');
        }
    }
}


