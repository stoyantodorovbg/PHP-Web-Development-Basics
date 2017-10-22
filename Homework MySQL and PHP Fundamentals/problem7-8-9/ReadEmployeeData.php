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
                SELECT `first_name`, `middle_name`, `last_name`, `department`, `position`, `passport_id`, `native_country_code`
                FROM `employees`
                WHERE `id` = ?
                ");
                    $query->execute([$id]);
                    foreach ($query as $i1 => $iv1) {
                        $native_country_code = $iv1['native_country_code'];
                        $country_name = ', from ';
                        if ($native_country_code != null) {
                            $query3 = $db->prepare("
                            SELECT `country_name`
                            FROM `countries`
                            WHERE `country_code` = \"$native_country_code\"
                            ");
                            $query3->execute();
                            foreach($query3 as $i => $iv) {
                                $country_name .= $iv['country_name'];
                            }
                        }
                        if ($country_name == ', from ') {
                            $country_name = '';
                        }
                        $row .= $id.', '.$iv1['first_name'].', '.$iv1['middle_name'].', '.$iv1['last_name'].', '.$iv1['department'].', '.$iv1['passport_id'].', '.$iv1['position'].$country_name;
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

    private function getCountryCode($country_name)
    {
        if ($this->dbi != false) {
            $db = $this->dbi;
            $query = $db->prepare("
            SELECT `country_code`
            FROM `countries`
            WHERE `country_name` = \"$country_name\"
            ");
            $code = false;
            $query->execute();
            foreach ($query as $i => $iv) {
                $code = $iv['code'];
            }
            $count = $query->rowCount();
            if ($count == 0) {
                echo "There isn't signed country for this employee.\n";
                return $code;
            } else {
                return $code;
            }

        } else {
            echo "There isn't connect to DB\n";
            return false;
        }
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