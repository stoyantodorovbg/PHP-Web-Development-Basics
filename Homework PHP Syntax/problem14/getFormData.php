<?php

if (isset($_GET['submit'])) {
    if(isset($_GET['name']) && isset($_GET['age']) &&
        (isset($_GET['male']) || isset($_GET['female']))) {
        $name = $_GET['name'];
        $age = $_GET['age'];
        if (isset($_GET['male'])) {
            $gander = 'male';
        } else {
            $gander = 'female';
        }

        $result = "My name is $name. I am $age years old. I am $gander.";
    }
}


include('form.php');