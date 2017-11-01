<?php


class EmployeeController extends Controller
{


    public function main()
    {
        $this->viewAll();
    }

    public function viewAll()
    {
        $model = new EmployeesModel($this->db);
        $res = $model->readAll();
        $this->loadView('header.php');
        $this->loadView('employees/view_all.php, $res');
        $this->loadView('footer.php');
    }

    public function addProject()
    {
        if (isset($_GET['employee_id']) && isset($_POST['save'])) {

        }
        if (isset($_POST['cancel'])) {
            header('Location: ?controller=EmployeeController');
        }
        $this->loadView('header.php');
        $this->loadView('employees/add_project.php, $res');
        $this->loadView('footer.php');
    }

}