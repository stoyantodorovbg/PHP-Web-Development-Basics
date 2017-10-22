<?php


class Employee
{
    private $first_name;
    private $middle_name;
    private $last_name;
    private $mails;
    private $dbi = false ;
    private $db;

    /**
     * Employee constructor.
     * @param $first_name
     * @param $middle_name
     * @param $last_name
     */
    public function __construct($first_name, $middle_name, $last_name, $mails)
    {
        $this->first_name = $first_name;
        $this->middle_name = $middle_name;
        $this->last_name = $last_name;
        $this->mails = $mails;
        $this->connectDb();
    }

    public function connectDb()
    {
        $db = new DB();
        $this->dbi = $db->connect();
    }

    public function addMails()
    {
        $id = $this->getUserId();
        $error = false;
        if ($id) {
            foreach($this->mails as $mail) {
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