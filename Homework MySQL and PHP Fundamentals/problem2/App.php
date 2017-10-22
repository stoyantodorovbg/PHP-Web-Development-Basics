<?php


class App
{
    public function main()
    {
        $input = trim(fgets(STDIN));
        $inpArr = explode(', ', $input);

        if (count($inpArr) == 6) {
            $employee = new Employee($inpArr[0], $inpArr[1],  $inpArr[2],  $inpArr[3], $inpArr[4], $inpArr[5]);
            echo $employee->insertEmployee();
        } else {
            echo 'Error: Please, check your input syntax.';
        }
    }
}