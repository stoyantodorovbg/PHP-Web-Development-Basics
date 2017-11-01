<?php
class MyController extends Controller
{
    public function main()
    {
        include "view/common/header.php";
        include "view/common/main.php";
        if ($this->input != null) {
            $inputArr1 = explode(', ', $this->input);
            $inputArr2 = explode(' ', $inputArr1[0]);
            $command = $inputArr2[0];
            switch($command){
                case 'sales':
                    $this->viewSales();
                    break;
                case 'add_sale':
                    $this->viewAddSale();
                    break;
                case 'customers':
                    $this->viewCustomers();
                    break;
                case 'cars':
                    $this->viewCars();
                    break;
                case 'Search':
                    $this->searchCarOwner($inputArr1[1]);
                    break;
                case 'Update':
                    $table = $inputArr2[1];
                    switch ($table) {
                        case 'customer':
                            $this->updateCustomer($inputArr1[1], $inputArr1[2], $inputArr1[3]);
                            break;
                        case 'car':
                            $this->updateCar($inputArr1[1], $inputArr1[2], $inputArr1[3]);
                            break;
                        case 'sale':
                            $this->updateSale($inputArr1[1], $inputArr1[2], $inputArr1[3]);
                            break;
                    }
                    break;
                default:
                    include 'view/error/404.php';
                    break;
            }
        }

        if (isset($_GET['action'])) {
            $get_action = $_GET['action'];
            switch ($get_action) {
                case 'view_sold_cars':
                    $this->viewCars();
                    break;
                case 'view_customers':
                    $this->viewCustomers();
                    break;
                case 'view_sales':
                    $this->viewSales();
                    break;
                case 'add_sale':
                    $this->viewAddSale();
                    break;
                case 'update_data':
                    $this->updateData();
                    break;
            }
        }

        $post_param = '';
        if (isset($_POST['add_sale'])) {
            $post_param = ($_POST['add_sale']);
        }
        switch ($post_param) {
            case 'add_sale':
                $this->addSale();
                break;
        }

        include "view/common/footer.php";
    }
    // Todo - change main() according to problem

    public function viewSales()
    {
        try {
            $sales = $this->readAllSales();
            $sales_total = $this->readTotal();
            include "view/searches/view_sales.php";
        } catch(PDOException $e){
            print "Error!: " . $e->getMessage() . "<br/>";
            include 'view/error/error_page.html';
        }

    }

    public function viewAddSale()
    {
        include 'view/create/add_sale.php';
    }

    public function addSale()
    {
        try {
            if (isset($_POST['submit']) &&
                isset($_POST['car_make']) &&
                isset($_POST['car_model']) &&
                isset($_POST['car_year']) &&
                isset($_POST['first_name']) &&
                isset($_POST['last_name']) &&
                isset($_POST['amount'])) {

                $car_make = $_POST['car_make'];
                $car_model = $_POST['car_model'];
                $car_year = $_POST['car_year'];
                $car = new CarsModel($this->db, $car_make, $car_model, $car_year);
                $car_id = $car->create();

                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $customer = new CustomersModel($this->db, $first_name, $last_name);
                $customer_id = $customer->create();

                $amount = $_POST['amount'];
                $date_time = date('Y-m-d H:i:s');

                $sale = new SalesModel($this->db, $date_time, $amount, $car_id, $customer_id);
                $sale->create();

                return $this->viewSales($date_time, $amount, $car_id, $customer_id);
            }
        } catch(PDOException $e){
            print "Error!: " . $e->getMessage() . "<br/>";
            include 'view/error/error_page.html';
        }

    }

    public function viewCustomers()
    {
        $sales = $this->readAllSales();;
        include  'view/searches/view_customers.php';;
    }

    public function viewCars()
    {
        $sales = $this->readAllSales();
        include 'view/searches/view_cars.php';
    }

    public function notFound()
    {
        include 'view/error/404.php';
    }

    public function readAllSales()
    {
        try {
            $stmt = $this->db->prepare("
              SELECT *         
                FROM `deal_`");
            $stmt->execute();
            $all = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ($all);
        } catch(PDOException $e){
            print "Error!: " . $e->getMessage() . "<br/>";
            include 'view/error/error_page.html';
        }
    }

    public function readTotal()
    {
        try{$stmt = $this->db->prepare("
            SELECT SUM(`amount`) as `total_amount`
              FROM `sales`");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row['total_amount'])
                return $row['total_amount'];
            else
                return false;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            include 'view/error/error_page.html';
        }
    }

    public function searchCarOwner($make)
    {
        try {
            $stmt = $this->db->prepare("
        SELECT * 
        FROM `deal_`
        WHERE `make` = \"$make\"
        ");
            $stmt->execute();
            $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
            include 'view/searches/view_car_owner.php';
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            include 'view/error/error_page.html';
        }

    }

    private function updateData()
    {
        $sales = $this->readAllSales();
        include 'view/update/update_data.php';

        if (isset($_POST['submit'])){
            if (isset($_POST['update_customer'])) {
                $id = $_POST['customer_id'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $this->updateCustomer($id, $first_name, $last_name);
            } elseif (isset($_POST['update_car'])) {
                $id = $_POST['car_id'];
                $car_make = $_POST['car_make'];
                $car_model = $_POST['car_model'];
                $this->updateCar($id, $car_make, $car_model);
            } elseif (isset($_POST['update_sale'])) {
                $id = $_POST['sale_id'];
                $date_time = $_POST['date_time'];
                $amount = $_POST['amount'];
                $this->updateSale($id, $date_time, $amount);
            }
        }
    }

    private function updateCar($id, $make, $model)
    {
        try {
            $stmt = $this->db->prepare("
        UPDATE `cars` 
        SET `make` = \"$make\", `model` = \"$model\"
        WHERE `id` = \"$id\"
        ");
            $stmt->execute();
            $value = 'Car';
            include 'view/update/updated.php';
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            include 'view/error/error_page.html';
        }
    }

    private function updateCustomer($id, $first_name, $last_name)
    {
        try {
            $stmt = $this->db->prepare("
        UPDATE `customers` 
        SET `first_name` = \"$first_name\", `last_name` = \"$last_name\"
        WHERE `id` = \"$id\"
        ");
            $stmt->execute();
            $value = 'Customer';
            include 'view/update/updated.php';
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            include 'view/error/error_page.html';
        }

    }

    private function updateSale($id, $date_time, $amount)
    {
        try {
            $stmt = $this->db->prepare("
        UPDATE `sales` 
        SET `date_time` = \"$date_time\", `amount` = \"$amount\"
        WHERE `id` = \"$id\"
        ");
            $stmt->execute();
            $value = 'Sale';
            include 'view/update/updated.php';
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            include 'view/error/error_page.html';
        }
    }




}
