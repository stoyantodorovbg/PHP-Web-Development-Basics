<table>
    <th>Name</th>
    <th>Job title</th>
    <th>Hire date</th>
    <th>Salary</th>
    <th>Actions</th>
    <?php foreach ($params as $i => $iv) {?>

        <tr>
            <td><?= $iv['first_name'].' '.$iv['middle_name'].' '.$iv['last_name'] ?></td>
            <td><?= $iv['job_title'] ?></td>
            <td><?= $iv['hire_date'] ?></td>
            <td><?= $iv['salary'] ?></td>
            <td><a href="?controller=EmployeeController&action=addProject&employee=$iv['employee_id]">Add project</a></td>
        </tr>

    <?php } ?>







</table>
