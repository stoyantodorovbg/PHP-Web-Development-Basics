<?php /** @var \TaskManagement\Data\CategoryDTO[] $data */ ?>
<h1>Add new task</h1>
<br/><br/>
<form method="post">
    Title: <input type="text" name="title" minlength="3" required><br/>
    Description: <textarea name="description" minlength="10" maxlength="10000" required></textarea><br/>
    Category: <select name="category_id" required>
    <?php
    foreach ($data as $category) { ?>
        <option value="<?=$category->getId()?>"><?=$category->getName()?></option>
    <?php } ?>
    </select><br/>
    Location: <input type="text" name="location" minlength="3" required><br/>
    Started on: <input type="datetime" name="started_on" required><br/>
    Due date: <input type="datetime" name="due_date" required><br/>
    <input type="submit" name="add" value="Save">
</form>
<br/><br/>

<a href="dashboard.php">List</a>
