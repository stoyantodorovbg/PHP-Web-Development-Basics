<?php

include 'Employee.php';

$inputLines = trim(intval(fgets(STDIN)));

$persons = [];

for ($i = 0; $i < $inputLines; $i++) {
    $lineInp = trim(fgets(STDIN));
    $lineArr = explode(' ', $lineInp);

    if (count($lineArr) == 5) {
        $lineArr[5] = null;
    } elseif (count($lineArr) == 4) {
        $lineArr[4] = null;
        $lineArr[5] = null;
    }

    $person = new Employee($lineArr[0], $lineArr[1], $lineArr[2], $lineArr[3], $lineArr[4], $lineArr[5]);
    $persons[] = $person;
}

$result = findHighestAverageSalary($persons);
printResult($result);

function printResult($result) {
    echo "Highest Average Salary: $result[0]\n";
    foreach($result[1] as $person) {
        $name = $person -> name;
        $salary = $person -> salary;
        $email = $person -> email;
        $age = $person -> age;
        echo "$name $salary $email $age\n";
    }
}

function findHighestAverageSalary($persons) {
    $departments = [];
    foreach($persons as $person) {
        $departments[] = [$person -> department, $person -> salary];
    }

    $sumSalary = [];
    $countDepartments = [];
    foreach($departments as $department) {
        if (!array_key_exists($department[0], $sumSalary)) {
            $sumSalary[$department[0]] = intval($department[1]);
            $countDepartments[$department[0]] = 1;
        } else {
            $sumSalary[$department[0]] += intval($department[1]);
            $countDepartments[$department[0]]++;
        }
    }

    $avDepartSalary = [];
    foreach($sumSalary as $key => $value) {
        $avDepartSalary[$key] = $value / $countDepartments[$key];
    }

    arsort($avDepartSalary);

    $firstKey = '';
    foreach($avDepartSalary as $key => $value) {
        $firstKey = $key;
        break;
    }

    $personsWithHighestSalary = [];

    foreach ($persons as $person) {
        if ($person -> department == $firstKey) {
            $personsWithHighestSalary[] = $person;
        }
    }
    return [$firstKey, $personsWithHighestSalary];
}
