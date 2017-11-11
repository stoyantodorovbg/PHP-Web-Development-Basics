<?php
/** @var \TaskManagement\Data\CategoryDTO[] $data */
?>
<h2>Report by category</h2>

<a href="dashboard.php">List</a>|
<a href="report.php">Report page</a>|
<a href="logout.php">logout</a>
<br/><br/>
<table border="1">
    <thead>
    <tr>
        <th>Category</th>
        <th>Tasks</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $category): ?>
        <tr>
            <td><?= $category->getName()?></td>
            <td><?= $category->getCount();?></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>

