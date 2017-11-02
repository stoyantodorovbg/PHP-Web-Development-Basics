<table>
    <th>Name</th>
    <th>Description</th>
    <th>Start date</th>
    <th>End date</th>
    <?php foreach ($params as $i => $iv) {?>
        <tr>
            <td><?= $iv['name'] ?></td>
            <td><?= $iv['description'] ?></td>
            <td><?= $iv['start_date'] ?></td>
            <td><?= $iv['end_date'] ?></td>
        </tr>

    <?php } ?>
</table>

