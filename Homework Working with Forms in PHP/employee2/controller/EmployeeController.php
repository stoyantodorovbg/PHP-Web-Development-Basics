<?php


class EmployeeController extends Controller
{

    private $filter_input;
    private $employee_id;

    /**
     * EmployeeController constructor.
     */
    public function __construct($db)
    {
        parent::__construct($db);
        $this->filter_input = new FilterInput();
    }


    public function main()
    {
        $this->viewAll();
    }

    public function viewAll()
    {
        $model = new EmployeesModel($this->db);
        $data = $model->readAll();
        $this->loadView('common/header.php');
        $this->loadView('employees/view_all.php', $data);
        $this->loadView('common/footer.php');
    }

    public function viewEmployeeProjects()
    {
        $this->filter_input->saveFromTagsGet();
        if (isset($_GET['employee_id'])) {
            $model = new EmployeesModel($this->db);
            $data = $model->readEmployeeProject($_GET['employee_id']);

            $this->loadView('common/header.php');
            $this->loadView('employees/employee_projects.php', $data);
            $this->loadView('common/footer.php');
        }
    }

    public function addProject()
    {
        $this->filter_input->saveFromTagsGet();
        if (isset($_GET['employee_id'])) {
            $this->submitProject($_GET['employee_id']);

            $this->loadView('common/header.php');
            $this->loadView('employees/add_project.php');
            $this->loadView('common/footer.php');
        }
    }

    public function submitProject($employee_id)
    {
        $this->filter_input->saveFromTagsPost();
        if (isset($_POST['save'])) {
            if ($this->validateAddProject()) {
                $name = $_POST['name'];
                $description = $_POST['description'];
                $start_date = $_POST['start_date'];
                $end_date = $_POST['end_date'];

                $model = new EmployeesModel($this->db);
                $model->addProject($employee_id, $name, $description, $start_date, $end_date);
            }
        }
        if (isset($_POST['cancel'])) {
            header('Location: ?controller=EmployeeController');
        }
    }

    private function validateAddProject() {
        if ($_POST['name'] == '' ) {
            echo 'The name of project can not be empty!';
            return false;
        } elseif ($_POST['description'] == '') {
            echo 'The description of project can not be empty!';
            return false;
        } elseif ($_POST['start_date'] == '') {
            echo 'The start date of project can not be empty!';
            return false;
        } elseif ($_POST['end_date'] == '') {
            echo 'The end date of project can not be empty!';
            return false;
        }
        return true;
    }


}