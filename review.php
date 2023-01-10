<?php include('header.php')?>
<?php

$edit = FALSE;
$id = htmlspecialchars($_GET["id"]??'');

if (!empty($id)) {
    $edit = TRUE;

    $result = mysqli_query($link, "SELECT * FROM reviews WHERE id=$id");
    $review = mysqli_fetch_assoc($result);
}
?>

<h1><?=($edit)?'Edit Review':'Add Review'?></h1>

<form action="functions.php" method="post">
    <input type="hidden" name="id" value="<?=$review['id']??''?>">
    <input class="form-control" type="text" name="Person_id" value="<?=$review['Person_id']??''?>" placeholder="Person_id"><br>
    <input class="form-control" type="text" name="Book_id" value="<?=$review['Book_id']??''?>" placeholder="Book_id"><br>
    <input class="form-control" type="text" name="Review_date" value="<?=$review['Review_date']??''?>" placeholder="Review_date"><br>
    <input class="form-control" type="text" name="Review" value="<?=$review['Review']??''?>" placeholder="Review"><br>
    <input class="btn btn-success btn-sm" type="submit" name="<?=($edit)?'review_edit':'review_add'?>" value="Save">

</form>

<?php include('footer.php')?>