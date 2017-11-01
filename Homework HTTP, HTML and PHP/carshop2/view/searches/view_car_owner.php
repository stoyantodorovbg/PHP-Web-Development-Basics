<div class="search">
<h2>Car owners:</h2>
<table>
    <th>make</th>
    <th>model</th>
    <th>year</th>
    <th>car id</th>
    <th>customer</th>
    <th>customer id</th>
    <?php foreach($cars as $i => $iv): ?>
        <tr>
            <td><?php echo($iv['make']);                                        ?></td>
            <td><?php echo($iv['model']);                                       ?></td>
            <td><?php echo($iv['year']);                                        ?></td>
            <td><?php echo($iv['car_id']);                                      ?></td>
            <td class="acc"><?php echo($iv['first_name'].' '.$iv['last_name']); ?></td>
            <td><?php echo($iv['customer_id']);                                 ?></td>

        </tr>
    <?php endforeach; ?>
</div>