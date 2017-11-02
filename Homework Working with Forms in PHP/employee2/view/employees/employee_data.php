<table>
    <th>Name</th>
    <th>Address</th>
    <th>Actions</th>
    <?php foreach ($params as $i => $iv) {
        $employee_id = $iv['employee_id']; ?>
        <tr>
            <td><?= $iv['first_name'].' '.$iv['middle_name'].' '.$iv['last_name'] ?></td>
            <td><?= $iv['address_text'].', '.$iv['town_name'] ?></td>
            <td><a href="?controller=AddressController&action=editEmployeeData&employee_id=<?=$employee_id;?>">Edit</a></td>
        </tr>

    <?php } ?>
</table>
