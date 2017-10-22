<?php


class ReadEmployeeData
{
    private $first_name;
    private $last_name;
    private $dbi = false ;
    private $db;

    /**
     * ReadEmployeeData constructor.
     * @param $first_name
     * @param $last_name
     */
    public function __construct($first_name, $last_name)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->connectDb();
    }

    public function connectDb()
    {
        $db = new DB();
        $this->dbi = $db->connect();
    }

    //queries

    public function getInfo()
    {
        $ids = $this->getUserId();
        $info = [];
        if ($ids) {
            foreach ($ids as $id) {
                $row = '';
                    $db = $this->dbi;
                    $query = $db->prepare("
                SELECT `first_name`, `middle_name`, `last_name`, `department`, `position`
                FROM `employees`
                WHERE `id` = ?
                ");
                    $query->execute([$id]);
                    foreach ($query as $i1 => $iv1) {
                        $row .= $id.', '.$iv1['first_name'].', '.$iv1['middle_name'].', '.$iv1['last_name'].', '.$iv1['department'].', '.$iv1['position'];
                        $query1 = $db->prepare("
                    SELECT `email`, `type`
                    FROM `employees_emails`
                    WHERE `id` = ?
                    ");
                        $query1->execute([$id]);
                        $mails = [];
                        foreach ($query1 as $i2 => $iv2) {
                            $mails[] = $iv2['type'].':'.$iv2['email'];
                        }
                        $mailsStr = implode(', ', $mails);
                        if ($mailsStr != '') {
                            $row .= ', '.$mailsStr."\n";
                        } else {
                            $row .= "\n";
                        }

                        $query2 = $db->prepare("
                    SELECT `phone`, `type`
                    FROM `employees_phones`
                    WHERE `id` = ?
                    ");
                        $query2->execute([$id]);
                        $phones = [];
                        foreach ($query2 as $i3 => $iv3) {
                            $phones[] = $iv3['type'].':'.$iv3['phone'];
                        }
                        $phonesStr = implode(', ', $phones);
                        if ($phonesStr != '') {
                            $row .= ', '.$phonesStr."\n";
                        } else {
                            $row .= "\n";
                        }
                    }
                $info[] = $row;
                }
        }
        return $info;
    }

    private function getUserId()
    {
        if ($this->dbi != false) {
            $db = $this->dbi;
            $query = $db->prepare("
            SELECT `id`
            FROM `employees`
            WHERE `first_name` = \"$this->first_name\"
            AND `last_name` = \"$this->last_name\"
            ");

            $id = false;
            $query->execute();
            $count = $query->rowCount();
            if ($count == 0) {
                echo "There isn't data for this employee.\n";
            } else {
                foreach ($query as $i => $iv) {
                    $id[] = $iv['id'];
                }
            }
            return $id;
        } else {
            echo "There isn't connect to DB\n";
            return false;
        }
    }
}