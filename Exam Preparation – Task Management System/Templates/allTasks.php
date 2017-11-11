<?php
/** @var \TaskManagement\Data\TaskDTO[] $data */
/** @var int $count */
?>
<h2>All tasks</h2>
<br/>

<a href="add_task.php">Add new task</a>|
<a href="report.php">Report page</a>|
<a href="logout.php">logout</a>
<br/><br/>
<table border="1">
    <thead>
    <tr><th>Title</th>
        <th>Category</th>
        <th>Author</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $task): ?>
        <tr>
            <td><?= $task->getTitle()?></td>
            <td><?= $task->getCategoryName();  ?></td>
            <td><?= $task->getFirstName().' '.$task->getLastName();  ?></td>
            <td><a href="edit_task.php?taskId=<?= $task->getId(); ?>">edit task</a></td>
            <td><a href="delete_task.php?taskId=<?= $task->getId(); ?>">delete task</a></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>

<br/>
<?php $lastPage = $count % 5;
if ($count > 5) { ?>
    <a href="dashboard.php">First</a>
    &&
    <a href="dashboard.php">Previous|</a>
    <a href="dashboard.php">1</a>
    <?php
    if ($lastPage != 0) {
        for ($e = 0, $i = 6; $i < $count; $i += 4, $e++) { ?>
            |<a href="dashboard.php?p=<?= $e + 1 ?>"><?= $e + 2 ?></a>
        <?php } ?>
        <a href="dashboard.php">|Next</a>
        §§
        <a href="dashboard.php">Last</a>
    <?php } else {
        for ($e = 0, $i = 6; $i < $count - 1; $i += 4, $e++) { ?>
            |<a href="dashboard.php?p=<?= $e + 1 ?>"><?= $e + 2 ?></a>
        <?php } $next = 2; if (isset($_GET['p'])) {
            $next = $_GET['p'] + 1;
        } ?>
        <a href="dashboard.php?<?php $next ?>">|Next</a>
        §§
        <a href="dashboard.php">Last</a>
    <?php }
} ?>
