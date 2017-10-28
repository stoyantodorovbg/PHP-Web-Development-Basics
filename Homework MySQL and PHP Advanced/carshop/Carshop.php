<?php
class Carshop
{
    private $db = false;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function main()
    {
        do{
            $input_str = trim(fgets(STDIN));
            if ($input_str == 'Sales') {
                echo $this->getSales();
            }

            $input_arr = explode(",", $input_str);
            //Sample: Audi, A4, 2004, Ivan, Ivanov, BGN 7000
            if(count($input_arr)  == 6){
                $car = [
                    'make' => $input_arr[0],
                    'model'=> $input_arr[1],
                    'year' => $input_arr[2],
                ];
                $person = [
                    'name' =>  $input_arr[3],
                    'family' => $input_arr[4]
                ];
                $amount = [
                    'amount' => str_replace('BGN', "", $input_arr[5])
                ];
                $sale_id = $this->setSale($car, $person, $amount);
                if ($sale_id) {
                    echo $this->getSaleDate($sale_id);
                }
            }
        }
        while($input_str != "Bye");
    }

    protected function setSale($car, $person, $amount)
    {
        try {
            // Insert into car
            $this->db->beginTransaction();
            $stmt = $this->db->prepare("
              INSERT INTO `cars`
                (`make`, `model`, `year`)
              VALUES
                (?, ?, ?)");
            $stmt->bindParam(1, $car['make']);
            $stmt->bindParam(2, $car['model']);
            $stmt->bindParam(3, $car['year']);
            $stmt->execute();
            $car_id = $this->db->lastInsertId();
            // Insert into customers
            $stmt = $this->db->prepare("
              INSERT INTO `customers`
                (`first_name`, `last_name`)
              VALUES
                (?, ?)");
            $stmt->bindParam(1, $person['name']);
            $stmt->bindParam(2, $person['family']);
            $stmt->execute();
            $customer_id = $this->db->lastInsertId();
            //Insert int sales
            $stmt = $this->db->prepare("
              INSERT INTO `sales`
                (`amount`, `car_id`, `customer_id`)
              VALUES
                (?, ?, ?)");
            $stmt->bindParam(1, $amount['amount']);
            $stmt->bindParam(2, $car_id);
            $stmt->bindParam(3, $customer_id);
            $stmt->execute();
            $sale_id = $this->db->lastInsertId();
            $this->db->commit();
            return $sale_id;
        } catch (PDOException $e) {
            $this->db->rollBack();
            print "Error!: " . $e->getMessage() . "<br/>";
            return false;
        }
    }

    protected function getSaleDate($sale_id)
    {
        $stmt = $this->db->prepare("
        SELECT `date_time`
        FROM `sales`
        WHERE `id` = $sale_id
        ");
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            return 'New sale entered '.$row['date_time'];
        }
        return false;
    }

    protected function getSales()
    {
        $stmt = $this->db->prepare("
        SELECT 
        `cars`.`cars`.`make`,
        `cars`.`cars`.`model`,
        `cars`.`cars`.`year`,
        `cars`.`sales`.`date_time` AS `date_of_deal`,
        `cars`.`sales`.`amount`
        FROM `sales`
        INNER JOIN `cars`
        ON `cars`.`id` = `sales`.`cars_id`
        ");
        $stmt->execute();
        $out = "";
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $out .= $row['make'].', '.$row['model'].', '.$row['date_of_deal'].', '.$row['amount'].PHP_EOL;
        }

        $stmt = $this->db->prepare("
        SELECT SUM(`amount`) AS `total_amount`
        FROM `sales`
        ");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $out .= '----------'.PHP_EOL.'Total: '.$row['total_amount'];
        }

        return $out;
    }
}