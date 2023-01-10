<?php include('header.php')?>
    
<?php
$result = mysqli_query($link, "SELECT * FROM reviews");

?>

<h1>Workers</h1>

<a class="btn btn-primary btn-sm" href="review.php">Add</a>

<table class="table">
<thead>
    <tr>
        <th>ID</th>
        <th>Person ID</th>
        <th>Book ID</th>
        <th>Review date</th>
        <th>Review</th>
        <th>Actions</th>
    </tr>
</thead>
<tbody>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?=$row["id"]?></td>
        <td><?=$row["Person_id"]?></td>
        <td><?=$row["Book_id"]?></td>
        <td><?=$row["Review_date"]?></td>
        <td><?=$row["Review"]?></td>
        <td>
            <a class="btn btn-secondary btn-sm" href="review.php?id=<?=$row["id"]?>">Edit</a>
            <a class="btn btn-danger btn-sm" href="functions.php?delete_review=<?=$row["id"]?>" onclick="return confirm('Confirm to delete review')">Delete</a>
        </td>
    </tr>
    <?php endwhile ?>

</tbody>
</table>

<?php include('footer.php')?>