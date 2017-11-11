<?php /** @var \TaskManagement\Data\UserDTO $data */?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>CONGRATULATIONS! <?= $data->getFirstName().' '.$data->getLastName();?></h1>
<br/><br/>

<a href="login.php">go to login</a>
</body>
</html>