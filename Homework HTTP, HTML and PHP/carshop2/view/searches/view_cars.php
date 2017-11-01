<div class="search">
<h2>Cars:</h2>
<table>
    <th>make</th>
    <th>model</th>
    <th>year</th>
    <th>amount</th>
    <?php foreach($sales as $i => $iv): ?>
        <tr>
            <td><?php echo($iv['make']);             ?></td>
            <td><?php echo($iv['model']);            ?></td>
            <td class="acc"><?php echo($iv['year']); ?></td>
            <td><?php echo($iv['amount']);           ?></td>

        </tr>
    <?php endforeach; ?>
</table>
</div>