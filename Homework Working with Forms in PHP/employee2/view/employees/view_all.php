<table>
    <th>Name</th>
    <th>Job title</th>
    <th>Hire date</th>
    <th>Salary</th>
    <th>Department</th>
    <th>Address</th>
    <th>Actions</th>
    <?php foreach ($params as $i => $iv) {
        $employee_id = $iv['employee_id'];
        ?>
        <tr>
            <td><?= $iv['first_name'].' '.$iv['middle_name'].' '.$iv['last_name'] ?></td>
            <td><?= $iv['job_title'] ?></td>
            <td><?= $iv['hire_date'] ?></td>
            <td><?= $iv['salary'] ?></td>
            <td><?= $iv['department_name'] ?></td>
            <td><?= $iv['address_text'].', '.$iv['town_name'] ?></td>
            <td>
                <a href="?controller=EmployeeController&action=addProject&employee_id=<?=$employee_id;?>">Add project</a>
                <a href="?controller=EmployeeController&action=viewEmployeeProjects&employee_id=<?=$employee_id;?>">Projects</a>
                <a href="?controller=AddressController&action=viewEmployeeAddress&employee_id=<?=$employee_id;?>">Address</a>
            </td>
        </tr>

    <?php } ?>
</table>
