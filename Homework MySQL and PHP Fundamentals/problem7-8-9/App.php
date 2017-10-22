<?php


class App
{
    public function main()
    {
        $input = trim(fgets(STDIN));
        $inpArr = explode(', ', $input);


        if ($inpArr[0] == 'Info') {
            $employee = new ReadEmployeeData($inpArr[1], $inpArr[2]);
            $output = $employee->getInfo();
            $outputStr = implode("----------\n", $output);
            echo $outputStr;
        } elseif (ctype_digit($inpArr[0])) {
            $data = [];
            for ($i = 5; $i < count($inpArr); $i++) {
                $data[] = $inpArr[$i];
            }
            if ($inpArr[4] == 'phones') {
                $employee = new AddEmployeeData($inpArr[1], $inpArr[2], $inpArr[3], $data);
                $employee->addPhonesById($inpArr[0]);
            } elseif ($inpArr[4] == 'emails') {
                $employee = new AddEmployeeData($inpArr[1], $inpArr[2], $inpArr[3], $data);
                $employee->addMailsById($inpArr[0]);
            }
        } else {
            $data = [];
            for ($i = 4; $i < count($inpArr) - 1; $i++) {
                $data[] = $inpArr[$i];
            }

            if ($inpArr[3] == 'phones') {
                $employee = new AddEmployeeData($inpArr[0], $inpArr[1], $inpArr[2], $data);
                $employee->addPhonesByNames();
            } elseif ($inpArr[3] == 'emails') {
                $employee = new AddEmployeeData($inpArr[0], $inpArr[1], $inpArr[2], $data);
                $employee->addMailsByNames();

            } else {
                $employee = new AddEmployeeData($inpArr[0], $inpArr[1], $inpArr[2], $data);
                $employee->setDepartment($inpArr[3]);
                $employee->setPosition($inpArr[4]);
                $employee->setPass($inpArr[5]);
                $employee->setNativeCountry($inpArr[6]);
                echo $employee->insertEmployee();
            }
        }
    }
}