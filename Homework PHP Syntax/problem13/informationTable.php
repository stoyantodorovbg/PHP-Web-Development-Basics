
<?php
if (isset($_GET['submit'])) {
    if (isset($_GET['name']) &&
        isset($_GET['phone']) &&
        isset($_GET['age']) &&
        isset($_GET['address'])) {

        $name = $_GET['name'];
        $phone = $_GET['phone'];
        $age = $_GET['age'];
        $address = $_GET['address'];

        $result = "<table border=\"1\" style=\"=border: 1px solid black;border-collapse: collapse;\">
    <tr>
        <td bgcolor='orange'>Name</td>
        <td>$name</td>
    </tr>
    <tr>
        <td bgcolor='orange'>Phone number</td>
        <td>$phone</td>

    </tr>
    <tr>
        <td bgcolor='orange'>Age</td>
        <td>$age</td>
    </tr>
    <tr>
        <td bgcolor='orange'>Address</td>
        <td>$address</td>
    </tr>
</table>";
    }
}


include("form.php");

