<?php include('header.php')?>
    
<?php
$result = mysqli_query($link, "SELECT * FROM books");
?>

<h1>List of Books</h1>

<a class="btn btn-primary btn-sm" href="book.php">Add</a>

<table class="table">
<thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Author</th>
        <th>Genre</th>
        <th>Actions</th>
    </tr>
</thead>
<tbody>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?=$row["id"]?></td>
        <td><?=$row["Name"]?></td>
        <td><?=$row["Author"]?></td>
        <td><?=$row["Genre"]?></td>
        <td>
            <a class="btn btn-secondary btn-sm" href="book.php?id=<?=$row["id"]?>">Edit</a>
            <a class="btn btn-danger btn-sm" href="functions.php?delete_book=<?=$row["id"]?>" onclick="return confirm('Confirm to delete book')">Delete</a>
        </td>
    </tr>
    <?php endwhile ?>

</tbody>
</table>

<?php include('footer.php')?>