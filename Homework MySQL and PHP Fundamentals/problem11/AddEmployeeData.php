<?php


class AddEmployeeData
{
    private $first_name;
    private $middle_name;
    private $last_name;
    private $department;
    private $position;
    private $pass;
    private $native_country;
    private $data;
    private $dbi = false ;
    private $db;

    /**
     * Employee constructor.
     * @param $first_name
     * @param $middle_name
     * @param $last_name
     */
    public function __construct($first_name, $middle_name, $last_name, $data)
    {
        $this->first_name = $first_name;
        $this->middle_name = $middle_name;
        $this->last_name = $last_name;
        $this->data = $data;
        $this->connectDb();
    }

    /**
     * @param mixed $department
     */
    public function setDepartment($department)
    {
        $this->department = $department;
    }

    /**
     * @param mixed $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @param mixed $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    /**
     * @param mixed $native_country
     */
    public function setNativeCountry($native_country)
    {
        $this->native_country = $native_country;
    }



    public function connectDb()
    {
        $db = new DB();
        $this->dbi = $db->connect();
    }

    public function addPhonesById ($id, $native_country = null)
    {
        $id = intval($id);
        $this->addPhones($id);
    }

    public function addMailsById($id, $native_country = '')
    {
        $id = intval($id);
        $this->addMails($id);
    }

    public function addPhonesByNames()
    {
        $id = $this->getUserId();
        if ($id) {
            $this->addPhones($id);
        }
    }

    public function addMailsByNames()
    {
        $id = $this->getUserId();
        if ($id) {
            $this->addMails($id);
        }
    }

    //queries

    public function insertEmployee()
    {
        if ($this->dbi != false) {
            $country_code = $this->getCountryCode();
            if ($country_code) {
                $db = $this->dbi;
                $query = $db->prepare("
        INSERT INTO `employees`
        (`first_name`, `middle_name`, `last_name`, `department`, `position`, `passport_id`, `native_country_code`)
        VALUES (?, ?, ?, ?, ?, ?, ?)
        ");
                $query->execute([$this->first_name, $this->middle_name, $this->last_name, $this->department, $this->position, $this->pass, $country_code]);

                return "New employee $this->first_name $this->middle_name $this->last_name saved.\n";
            } else {
                $db = $this->dbi;
                $query = $db->prepare("
        INSERT INTO `employees`
        (`first_name`, `middle_name`, `last_name`, `department`, `position`, `passport_id`)
        VALUES (?, ?, ?, ?, ?, ?)
        ");
                $query->execute([$this->first_name, $this->middle_name, $this->last_name, $this->department, $this->position, $this->pass]);

                return "New employee $this->first_name $this->middle_name $this->last_name saved.\n";
            }
        } else {
            return "There isn't connect to DB";
        }
    }

    private function addPhones ($id) {
        $error = false;
        foreach($this->data as $phone) {
            $phoneArr = explode(': ', $phone);
            if (count($phoneArr) < 2 || preg_match( '/[a-zA-Z]/', $phoneArr[1] )) {
                echo "Error: Please, check your input phone number syntax.";
                $error = true;
                break;
            }
            $db = $this->dbi;
            $query = $db->prepare("
                INSERT INTO `employees_phones`
                (`id`, `phone`, `type`) 
                VALUES (?, ?, ?)
            ");
            $query->execute([$id, $phoneArr[1], $phoneArr[0]]);
        }
        if (!$error) {
            echo 'Phones of '.$this->first_name.' '.$this->middle_name.' '.$this->last_name." saved\n";
        }
    }

    private function addMails ($id) {
        $error = false;
        foreach($this->data as $mail) {
            $mailArr = explode(': ', $mail);
            if (count($mailArr) < 2) {
                echo "Error: Please, check your input email syntax.";
                $error = true;
                break;
            }
            $db = $this->dbi;
            $query = $db->prepare("
                INSERT INTO `employees_emails`
                (`id`, `email`, `type`) 
                VALUES (?, ?, ?)
            ");
            $query->execute([$id, $mailArr[1], $mailArr[0]]);
        }
        if (!$error) {
            echo 'Emails of '.$this->first_name.' '.$this->middle_name.' '.$this->last_name." saved\n";
        }
    }

    private function getCountryCode()
    {
        $country_name = $this->native_country;
        if ($this->dbi != false) {
            $db = $this->dbi;
            $query = $db->prepare("
            SELECT `country_code`
            FROM `countries`
            WHERE `country_name` = \"$country_name\"
            ");
            $query->execute();
            $country_code = false;
            foreach ($query as $i => $iv) {
                $country_code = $iv['country_code'];
            }
            if ($country_code == false) {
                echo "There isn't signed country for this employee.\n";
                return $country_code;
            } else {
                return $country_code;
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
            AND `middle_name` = \"$this->middle_name\"
            AND `last_name` = \"$this->last_name\"
            ");

            $id = false;
            $query->execute();
            $count = $query->rowCount();
            if ($count == 1) {
                foreach ($query as $i => $iv) {
                    $id = $iv['id'];
                }
            } elseif ($count == 0) {
                echo "There isn't data for this employee.\n";
            } else {
                foreach ($query as $i => $iv) {
                    $id[] = $iv['id'];
                }
                $text = implode(', ', $id);
                echo "Employees with this name: $text\n";
                $id = false;
            }
            return $id;
        } else {
            echo "There isn't connect to DB\n";
            return false;
        }
    }
}