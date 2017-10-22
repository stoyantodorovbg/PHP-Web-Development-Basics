<?php


class Employee
{
    private $first_name;
    private $middle_name;
    private $last_name;
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

    public function connectDb()
    {
        $db = new DB();
        $this->dbi = $db->connect();
    }

    //queries

    public function addPhonesById ($id) {
        $id = intval($id);
        $this->addPhones($id);
    }

    public function addMailsById($id) {
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