<?php /** @var \App\Data\UserDTO $data */ ?>


<h1>Your profile</h1>
<br/><br/>

<form method="POST">
    <label>Username</label><br/>
    <input type="text" name="username" value="<?=$data->getUsername()?>"></br>
    <label>Password</label><br/>
    <input type="password" name="password"></br>
    <label>First name</label><br/>
    <input type="text" name="firstName" value="<?=$data->getFirstName()?>"></br>
    <label>Last name</label><br/>
    <input type="text" name="lastName" value="<?=$data->getLastName()?>"></br>
    <label>Birthday</label><br/>
    <input type="text" name="bornOn" value="<?=$data->getBornOn()?>"></br>
    <input type="submit" name="editProfile" value="Edit Profile">
</form>

You can <a href="logout.php">log out</a>,
<a href="addEmail.php">add email</a>
 or view <a href="allUsers.php?p=1">all users</a>

