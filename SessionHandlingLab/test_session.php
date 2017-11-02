<?php
echo '<pre>';
session_start();
print_r($_SESSION);

$_SESSION['username'] = 'Gosho';

if (isset($_GET['name'])) {
    echo 'Your name is '.$_GET['name'];
    $_SESSION['name'] = $_GET['name'];
}elseif (isset($_SESSION['name'])) {
    echo 'Your name is '.$_SESSION['name'];
} else {
    echo 'What is your name? <form><input type="text" name="name"/></form>';
}

//session_destroy();
//session_commit();
//session_abort();
