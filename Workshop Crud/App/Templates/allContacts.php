<?php
/** @var \App\Data\ContactDTO[] $data */
/** @var int $count */
?>

<h1>Contacts</h1>

<table border="1">
    <thead>
    <tr>
        <th>Name</th>
        <th>Number</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $contact): ?>
        <tr>
            <td><?= $contact->getFirstName().' '.$contact->getLastName() ?></td>
            <td><?= $contact->getPhoneNumber();  ?></td>
            <td><a href="editContact.php?contactId=<?= $contact->getId(); ?>">Edit</a> <a href="deleteContact.php?contactId=<?= $contact->getId(); ?>">Delete</a></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
<br/>
<a href="contacts.php">1</a>
<?php $lastPage = $count % 3;
if ($lastPage = 1) {
for ($e = 0, $i = 4; $i <= $count; $i += 3, $e++){ ?>
    <a href="contacts.php?p=<?= $e + 1 ?>"><?= $e + 2?></a>
<?php }
} else {
    for ($e = 0, $i = 4; $i < $count; $i += 3, $e++) { ?>
        <a href="contacts.php?p=<?= $e + 1 ?>"><?= $e + 1 ?></a>
    <?php }
}?>


<br/><br/>
<a href="createContact.php">Add contact</a>