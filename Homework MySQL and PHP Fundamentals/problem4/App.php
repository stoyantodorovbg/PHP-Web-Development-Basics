<?php


class App
{
    public function main()
    {
        $input = trim(fgets(STDIN));
        $inpArr = explode(', ', $input);

        if (ctype_digit($inpArr[0])) {
            $data = [];
            for ($i = 5; $i < count($inpArr); $i++) {
                $data[] = $inpArr[$i];
            }
            if ($inpArr[4] == 'phones') {
                $employee = new Employee($inpArr[1], $inpArr[2], $inpArr[3], $data);
                $employee->addPhonesById($inpArr[0]);
            } elseif ($inpArr[4] == 'emails') {
                $employee = new Employee($inpArr[1], $inpArr[2], $inpArr[3], $data);
                $employee->addMailsById($inpArr[0]);
            }
        } else {
            $data = [];
            for ($i = 4; $i < count($inpArr); $i++) {
                $data[] = $inpArr[$i];
            }

            if ($inpArr[3] == 'phones') {
                $employee = new Employee($inpArr[0], $inpArr[1], $inpArr[2], $data);
                $employee->addPhonesByNames();
            } elseif ($inpArr[3] == 'emails') {
                $employee = new Employee($inpArr[0], $inpArr[1], $inpArr[2], $data);
                $employee->addMailsByNames();

            }
        }
    }
}