<?php
class MyController extends Controller
{
    public function main()
    {
        include "view/header.php";
        include "view/main.php";
        switch($this->input){
            case 'sales':
                $this->viewSales();
                break;
            default:
                break;
        }
        include "view/footer.php";
    }
    // Todo - change main() according to problem

    public function viewSales()
    {
        $s = new SalesModel($this->db);
        $sales = $s->readAll();
        $sales_total = $s->readTotal();
        include "view/read_sales.php";
    }

    // Todo - problem 1
    // Implement addSale()

    // Todo - problem 2
    // Implement viewCustomers()

    // Todo - problem 3
    // Implement viewCars()

    // Todo - Problem 6
    // Implement searchCarOwner()
}
