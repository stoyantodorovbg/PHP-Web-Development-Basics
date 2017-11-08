<?php /** @var \App\Data\EmailDTO $data */ ?>

<h1><b>Edit email</b></h1>
<br/><br/>

<form method="POST">
    <label>Email</label><br/>
    <input type="text" name="emailName" value="<?=$data->getEmailName()?>"></br>
    <input type="submit" name="editEmail" value="Edit Email">
</form>
