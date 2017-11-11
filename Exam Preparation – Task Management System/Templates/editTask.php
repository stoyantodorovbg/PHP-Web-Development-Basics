<?php
/** @var \TaskManagement\Data\TaskDTO $data */
/** @var \TaskManagement\Data\CategoryDTO[] $count */
?>
<h1>Edit task "<?=$data->getTitle();?>"</h1>
<br/><br/>
<form method="post">
    Title: <input type="text" name="title" value="<?=$data->getTitle();?>" minlength="3" required><br/>
    Description: <textarea name="description" minlength="10" maxlength="10000" required><?=$data->getDescription();?></textarea><br/>
    Category: <select name="category_id" required>
        <?php
        foreach ($count as $category) { ?>
            <option value="<?=$category->getId()?>"><?=$category->getName()?></option>
        <?php } ?>
    </select><br/>
    Location: <input type="text" name="location" value ="<?=$data->getLocation();?>" minlength="3" required><br/>
    Started on: <input type="datetime" name="started_on" value ="<?=$data->getStartedOn();?>" required><br/>
    Due date: <input type="datetime" name="due_date" value ="<?=$data->getDueDate();?>" required><br/>
    <input type="submit" name="edit" value="Save">
</form>
<br/><br/>

<a href="dashboard.php">List</a>
