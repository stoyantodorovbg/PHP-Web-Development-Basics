<form method="get">
    <input type="text" name="name" value="Name..">
    <br>
    <input type="text" name="age" value="Age..">
    <br>
    <input type="radio" name="male">Male
    <br>
    <input type="radio" name="female">Female
    <br>
    <input type="submit" name="submit">
</form>

<?php
if (isset($result)) {
    echo $result;
}

