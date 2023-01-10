<?php include('header.php')?>
<?php

$edit = FALSE;
$id = htmlspecialchars($_GET["id"]??'');

if (!empty($id)) {
    $edit = TRUE;

    $result = mysqli_query($link, "SELECT * FROM persons WHERE id=$id");
    $person = mysqli_fetch_assoc($result);
}
?>

<h1><?=($edit)?'Edit User':'Add User'?></h1>

<form action="functions.php" method="post">
    <input type="hidden" name="id" value="<?=$person['id']??''?>">
    <input class="form-control" type="text" name="Name" value="<?=$person['Name']??''?>" placeholder="Name"><br>
    <input class="form-control" type="text" name="Surname" value="<?=$person['Surname']??''?>" placeholder="Surname"><br>
    <input class="form-control" type="text" name="Age" value="<?=$person['Age']??''?>" placeholder="Age"><br>
    <input class="btn btn-success btn-sm" type="submit" name="<?=($edit)?'person_edit':'person_add'?>" value="Save">

</form>

<?php include('footer.php')?>