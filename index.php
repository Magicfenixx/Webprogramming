<?php include('header.php')?>
<?php
$result = mysqli_query($link, "SELECT * FROM persons");

?>



<h1>Library users</h1>

<a href="person.php" class="btn btn-primary btn-sm">Add</a>

<table class="table">
<thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Age</th>
        <th>Actions</th>
    </tr>
</thead>
<tbody>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?=$row["id"]?></td>
        <td><?=$row["Name"]?></td>
        <td><?=$row["Surname"]?></td>
        <td><?=$row["Age"]?></td>
        <td>
            <a class="btn btn-secondary btn-sm" href="person.php?id=<?=$row["id"]?>">Edit</a>
            <a class="btn btn-danger btn-sm" href="functions.php?delete_person=<?=$row["id"]?>" onclick="return confirm('Confirm to delete user')">Delete</a>
        </td>
    </tr>
    <?php endwhile ?>

</tbody>
</table>
<?php include('footer.php')?>