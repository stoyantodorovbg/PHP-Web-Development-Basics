<?php /** @var \App\Data\EmailDTO[] $data */?>
<h1>Emails</h1>
<table border="1">
    <thead>
    <tr>
        <th>Email</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($data as $email): ?>
        <tr>
            <td><?= $email->getEmailName(); ?></td>
            <?php if ($email->getUserId() == $_SESSION['id']) { ?>
            <td><a href="editEmail.php?emailId=<?= $email->getEmailId()?>">Edit</a> <a href="DeleteEmail.php?emailId=<?= $email->getEmailId()?>">Delete</a></td>
            <?php }?>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
<br>
Go back to your <a href="profile.php">profile</a>