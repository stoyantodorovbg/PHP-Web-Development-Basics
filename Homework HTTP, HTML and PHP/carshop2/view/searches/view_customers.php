<div class="search">
<h2>Customers:</h2>
<table>
    <th>date of the sale</th>
	<th>amount</th>
    <th>make</th>
	<th>model</th>
	<th>year</th>
	<th>first name</th>
    <th>last name</th>
	<?php foreach($sales as $i => $iv): ?>
    <tr>
        <td><?php echo($iv['date_time']);        ?></td>
        <td><?php echo($iv['amount']);           ?></td>
        <td><?php echo($iv['make']);             ?></td>
        <td><?php echo($iv['model']);            ?></td>
        <td class="acc"><?php echo($iv['year']); ?></td>
        <td><?php echo($iv['first_name']);       ?></td>
        <td><?php echo($iv['last_name']);        ?></td>

    </tr>
<?php endforeach; ?>
</table>
</div>