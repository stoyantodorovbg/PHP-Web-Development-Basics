<?php
echo '<pre>';
print_r($_COOKIE);
setcookie('first_name', 'Ivan', time()+60, '/path/*', 'domain');
setcookie('last_name', 'Ivanov', '/path/*');
setcookie('middle_name', 'Ivanov');
setcookie('middle_name', 'Ivanov', time()-60);

if (isset($_GET['name'])) {
    echo 'Hi, '.$_GET['name'].'!';
    setcookie('name', $_GET['name']);
} elseif(isset($_COOKIE['name'])) {
    echo 'Hi, '.$_COOKIE['name'].'!';
}
else {
    echo 'What is your name? <form><input type="text" name="name"/></form>';
}

