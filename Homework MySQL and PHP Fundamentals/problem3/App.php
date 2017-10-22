<?php


class App
{
    public function main()
    {
        $input = trim(fgets(STDIN));
        $inpArr = explode(', ', $input);

        $mails = [];
        for ($i = 4; $i < count($inpArr); $i++) {
            $mails[] = $inpArr[$i];
        }

        $employee = new Employee($inpArr[0], $inpArr[1], $inpArr[2], $mails);
        $employee->addMails();

    }
}