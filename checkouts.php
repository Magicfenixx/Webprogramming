<?php include('header.php')?>
    
<?php
$result = mysqli_query($link, "SELECT * FROM checkouts");
?>

<h1>Checkouts</h1>

<a class="btn btn-primary btn-sm" href="checkout.php">Add</a>

<table class="table">
<thead>
    <tr>
        <th>Person ID</th>
        <th>Book ID</th>
        <th>Borrowing start date</th>
        <th>Borrowing duration (in months)</th>
        <th>Actions</th>
    </tr>
</thead>
<tbody>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?=$row["Person_id"]?></td>
        <td><?=$row["Book_id"]?></td>
        <td><?=$row["Start_date"]?></td>
        <td><?=$row["borrow_duration"]?></td>
        <td>
            <a class="btn btn-secondary btn-sm" href="checkout.php?id=<?=$row["Checkout_id"]?>">Edit</a>
            <a class="btn btn-danger btn-sm" href="functions.php?delete_checkout=<?=$row["Checkout_id"]?>" onclick="return confirm('Confirm to delete checkout')">Delete</a>
        </td>
    </tr>
    <?php endwhile ?>

</tbody>
</table>

<?php include('footer.php')?>