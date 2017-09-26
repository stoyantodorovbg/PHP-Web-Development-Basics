<?php

$filterBase = false;
$dataBase = ['age' => [], 'salary' => [], 'position' => []];

while(true) {
    $input = trim(fgets(STDIN));

    if ($input === 'filter base') {
        $filterBase = true;
        continue;
    }

    if (!$filterBase) {
        $inputArr = explode(' -> ', $input);
        if (is_float(intval($inputArr[1]))) {
            $dataBase['salary'][$inputArr[0]] = intval($inputArr[1]);
        } elseif (is_numeric($inputArr[1])) {
            $dataBase['age'][$inputArr[0]] = $inputArr[1];
        } else {
            $dataBase['position'][$inputArr[0]] = $inputArr[1];
        }
    } else {
        switch ($input) {
            case 'Salary':
                foreach ($dataBase['salary'] as $key => $value) {
                    $valuePrint = round($value, 2);
                    echo "Name: $key\nSalary:$value: $valuePrint\n====================\n";
                }
                break;
            case 'Age':
                foreach ($dataBase['age'] as $key => $value) {
                    echo "Name: $key\nAge: $value\n====================\n";
                }
                break;
            case 'Position':
                foreach ($dataBase['position'] as $key => $value) {
                    echo "Name: $key\nAge: $value\n====================\n";
                }
                break;
        }
    }
}

