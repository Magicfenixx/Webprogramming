<?php include('header.php')?>

<?php
$edit = FALSE;
$id = htmlspecialchars($_GET["id"]??'');

if (!empty($id)) {
    $edit = TRUE;

    $result = mysqli_query($link, "SELECT * FROM books WHERE id=$id");
    $book = mysqli_fetch_assoc($result);
}
?>

<h1><?=($edit)?'Edit book':'Add book'?></h1>

<form action="functions.php" method="post">
    <input type="hidden" name="id" value="<?=$book['id']??''?>">
    <input type="text" name="Name" value="<?=$book['Name']??''?>" placeholder="Name"><br>
    <input type="text" name="Author" value="<?=$book['Author']??''?>" placeholder="Author"><br>
    <input type="text" name="Genre" value="<?=$book['Genre']??''?>" placeholder="Genre"><br>
    <input type="submit" name="<?=($edit)?'book_edit':'book_add'?>" value="Save">
</form>

<?php include('footer.php')?>