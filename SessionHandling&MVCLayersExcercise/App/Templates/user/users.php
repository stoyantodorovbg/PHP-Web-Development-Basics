<?php /** @var array $data */?>
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
    <?php foreach ($data[0] as $user): ?>
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

<?php $lastPage = $data[1] % 3;
for ($e = 0, $i = 4; $i <= $data[1] + $lastPage; $i += 2, $e++){ ?>
    <a href="?p=<?= $e ?>"><?= $e + 1?></a>
<?php } ?>
<br>
Go back to your <a href="profile.php">profile</a>
