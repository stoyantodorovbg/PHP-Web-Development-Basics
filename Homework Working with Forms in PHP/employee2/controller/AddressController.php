<?php


class AddressController extends Controller
{
    private $filter_input;
    private $employee_id;

    public function main()
    {

    }

    /**
     * EmployeeController constructor.
     */
    public function __construct($db)
    {
        parent::__construct($db);
        $this->filter_input = new FilterInput();
    }

    public function viewEmployeeAddress()
    {
        $this->filter_input->saveFromTagsGet();
        if (isset($_GET['employee_id'])) {
            $model = new AddressesModel($this->db);
            $data = $model->readEmployeeAddress($_GET['employee_id']);

            $this->loadView('common/header.php');
            $this->loadView('employees/employee_data.php', $data);
            $this->loadView('common/footer.php');
        }
    }

    public function editEmployeeData()
    {
        $this->filter_input->saveFromTagsGet();
        if (isset($_GET['employee_id'])) {
            $this->submitEditEmployee($_GET['employee_id']);

            $this->loadView('common/header.php');
            $this->loadView('employees/edit_employee_data.php');
            $this->loadView('common/footer.php');
        }
    }

    private function submitEditEmployee($employee_id)
    {
        $this->filter_input->saveFromTagsPost();
        if (isset($_POST['save'])) {
            if ($this->validateEditEmployee()) {
                $first_name = $_POST['first_name'];
                $middle_name = $_POST['middle_name'];
                $last_name = $_POST['last_name'];
                $town_name = $_POST['town_name'];
                $address_text = $_POST['address_text'];

                $model = new AddressesModel($this->db);
                $model->editEmployeeData($employee_id, $first_name, $middle_name, $last_name, $town_name, $address_text);
            }
        }
        if (isset($_POST['cancel'])) {
            header('Location: ?controller=EmployeeController');
        }
    }

    private function validateEditEmployee()
    {
        if ($_POST['first_name'] == '' ) {
            echo 'The first name can not be empty!';
            return false;
        } elseif ($_POST['middle_name'] == '') {
            echo 'The middle name can not be empty!';
            return false;
        } elseif ($_POST['last_name'] == '') {
            echo 'The last name can not be empty!';
            return false;
        } elseif ($_POST['town_name'] == '') {
            echo 'Enter a town!';
            return false;
        } elseif ($_POST['address_text'] == '') {
            echo 'Enter un address!';
            return false;
        }
        return true;
    }
}