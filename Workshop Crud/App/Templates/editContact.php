<?php /** @var \App\Data\ContactDTO $data */ ?>

<h1>Edit contact</h1>
<br/><br/>

<form method="POST">
    <label>First name</label><br/>
    <input type="text" name="firstName" value="<?=$data->getFirstName()?>"></br>
    <label>Last name</label><br/>
    <input type="text" name="lastName" value="<?=$data->getLastName()?>"></br>
    <label>Phone number</label><br/>
    <input type="text" name="phoneNumber" value="<?=$data->getPhoneNumber()?>"></br>
    <input type="submit" name="editContact" value="Edit">
</form>


