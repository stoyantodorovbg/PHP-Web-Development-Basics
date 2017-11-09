<?php
/** @var array $data */
/** @var int $count */
?>

<h1>All users</h1>
<table border="1">
<thead>
<tr>
    <th>Id</th>
    <th>Username</th>
    <th>Name</th>
    <th>Born on</th>
    <th>Actions</th>
</tr>
</thead>
    <tbody>
    <?php foreach ($data as $user): ?>
    <tr>
        <td><?= $user->getId();  ?></td>
        <td><?= $user->getUsername();  ?></td>
        <td><?= $user->getFirstName().' '.$user->getLastName();  ?></td>
        <td><?= $user->getBornOn();  ?></td>
        <td><a href="emailsPerUser.php?userId=<?= $user->getId(); ?>">View emails</a></td>
    </tr>
    <?php endforeach ?>
    </tbody>
</table>
<br/>
<a href="AllUsers.php">1</a>
<?php $lastPage = $count % 3;
if ($lastPage = 1) {
    for ($e = 0, $i = 4; $i <= $count; $i += 3, $e++){ ?>
        <a href="allUsers.php?p=<?= $e + 1 ?>"><?= $e + 2?></a>
    <?php }
} else {
    for ($e = 0, $i = 4; $i < $count; $i += 3, $e++) { ?>
        <a href="allUsers.php?p=<?= $e + 1?>"><?= $e + 2 ?></a>
    <?php }
}?>
<br/><br/>
Go back to your <a href="profile.php">profile</a>
