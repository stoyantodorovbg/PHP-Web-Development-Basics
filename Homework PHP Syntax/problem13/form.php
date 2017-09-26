<form method="get">
    Name:
    <input type="text" name="name">
    <br>
    Phone:
    <input type="text" name="phone">
    <br>
    Age:
    <input type="text" name="age">
    <br>
    Address:
    <input type="text" name="address">
    <br>
    <input type="submit" name="submit">
</form>
<?php
if (isset($result)) {
    echo $result;
}
