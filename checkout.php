<?php include('header.php')?>
<?php

$edit = FALSE;
$id = htmlspecialchars($_GET["id"]??'');

if (!empty($id)) {
    $edit = TRUE;

    $result = mysqli_query($link, "SELECT * FROM checkouts WHERE Checkout_id=$id;");
    $checkout = mysqli_fetch_assoc($result);
}
?>

<h1><?=($edit)?'Edit Checkout':'Add Checkout'?></h1>

<form action="functions.php" method="post">
    <input type="hidden" name="Checkout_id" value="<?=$checkout['Checkout_id']??''?>">
    <input class="form-control" type="text" name="Person_id" value="<?=$checkout['Person_id']??''?>" placeholder="Person_id"><br>
    <input class="form-control" type="text" name="Book_id" value="<?=$checkout['Book_id']??''?>" placeholder="Book_id"><br>
    <input class="form-control" type="text" name="Start_date" value="<?=$checkout['Start_date']??''?>" placeholder="Start_date"><br>
    <input class="form-control" type="text" name="borrow_duration" value="<?=$checkout['borrow_duration']??''?>" placeholder="borrow_duration"><br>
    <input class="btn btn-success btn-sm" type="submit" name="<?=($edit)?'checkout_edit':'checkout_add'?>" value="Save">

</form>

<?php include('footer.php')?>