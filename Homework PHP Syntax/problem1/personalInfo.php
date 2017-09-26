<form method="get">
    first name:
    <input type="text" name="firstName">
    <br>
    last name:
    <input type="text" name="lastName">
    <br>
    last name:
    <input type="text" name="age">
    <br>
    <input type="submit" name="submit">
</form>
<?php
if (isset($_GET['submit'])) {
    if($_GET['firstName'] && $_GET['lastName'] && $_GET['age']) {
        $firstName = $_GET['firstName'];
        $lastName = $_GET['lastName'];
        $age = $_GET['age'];
        echo "My name is $firstName $lastName and I am $age years old.";
    }
}


