<?php

include('db.php');

function pre($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

// PERSON

if (!empty($_POST["person_add"]??'')){
    $Name = htmlspecialchars($_POST["Name"]);
    $Surname = htmlspecialchars($_POST["Surname"]);
    $Age = htmlspecialchars($_POST["Age"]);

    $sql = "INSERT INTO persons
    (Name, Surname, Age)
    VALUES
    ('$Name', '$Surname', '$Age')";

    $result = mysqli_query($link, $sql);
    header('Location: index.php');
    exit();
}

if (!empty($_POST["person_edit"]??'')){
    $id = htmlspecialchars($_POST["id"]);
    $Name = htmlspecialchars($_POST["Name"]);
    $Surname = htmlspecialchars($_POST["Surname"]);
    $Age = htmlspecialchars($_POST["Age"]);

    // UPDATE `persons` SET `Surname` = 'Swift12' WHERE id = 3;

    $sql = "UPDATE persons SET
    Name='$Name',
    Surname='$Surname',
    Age='$Age'
    WHERE id=$id";

    $result = mysqli_query($link, $sql);
    header('Location: index.php');
    exit();
}


if (isset($_GET['delete_person']) && is_numeric($_GET['delete_person'])){
    $id = htmlspecialchars($_GET['delete_person']);
    $sql = "DELETE FROM persons WHERE id=$id";
    $result = mysqli_query($link, $sql);
    header('Location: index.php');
    exit();
}



// checkout

if (!empty($_POST["checkout_add"]??'')){
    $Person_id = htmlspecialchars($_POST["Person_id"]);
    $Book_id = htmlspecialchars($_POST["Book_id"]);
    $Start_date = htmlspecialchars($_POST["Start_date"]);
    $borrow_duration= htmlspecialchars($_POST["borrow_duration"]);


    // INSERT INTO `checkouts` (`Checkout_id`, `Person_id`, `Book_id`, `Start_date`, `borrow_duration`) VALUES (NULL, '4', '4', '2022-11-07', '5');


    $sql = "INSERT INTO checkouts
    (Person_id, Book_id, Start_date, borrow_duration)
    VALUES
    ('$Person_id', '$Book_id', '$Start_date', '$borrow_duration')";

    $result = mysqli_query($link, $sql);
    header('Location: checkouts.php');
    exit();
}

if (!empty($_POST["checkout_edit"]??'')){
    $id = htmlspecialchars($_POST["Checkout_id"]);
    $Person_id = htmlspecialchars($_POST["Person_id"]);
    $Book_id = htmlspecialchars($_POST["Book_id"]);
    $Start_date = htmlspecialchars($_POST["Start_date"]);
    $borrow_duration= htmlspecialchars($_POST["borrow_duration"]);

    // UPDATE `checkouts` SET `Book_id` = 'Swift12' WHERE id = 3;

    $sql = "UPDATE checkouts SET
    Person_id='$Person_id',
    Book_id='$Book_id',
    Start_date='$Start_date',
    borrow_duration='$borrow_duration'
    WHERE Checkout_id=$id";

    $result = mysqli_query($link, $sql);
    header('Location: checkouts.php');
    exit();
}


if (isset($_GET['delete_checkout']) && is_numeric($_GET['delete_checkout'])){
    $id = htmlspecialchars($_GET['delete_checkout']);
    $sql = "DELETE FROM checkouts WHERE Checkout_id=$id";
    $result = mysqli_query($link, $sql);
    header('Location: checkouts.php');
    exit();
}

// book

if (!empty($_POST["book_add"]??'')){
    $Name = htmlspecialchars($_POST["Name"]);
    $Author = htmlspecialchars($_POST["Author"]);
    $Genre = htmlspecialchars($_POST["Genre"]);

    $sql = "INSERT INTO books
    (Name, Author, Genre)
    VALUES
    ('$Name', '$Author', '$Genre')";

    $result = mysqli_query($link, $sql);
    header('Location: books.php');
    exit();
}

if (!empty($_POST["book_edit"]??'')){
    $id = htmlspecialchars($_POST["id"]);
    $Name = htmlspecialchars($_POST["Name"]);
    $Author = htmlspecialchars($_POST["Author"]);
    $Genre = htmlspecialchars($_POST["Genre"]);

    // UPDATE `books` SET `Author` = 'Swift12' WHERE id = 3;

    $sql = "UPDATE books SET
    Name='$Name',
    Author='$Author',
    Genre='$Genre'
    WHERE id=$id";

    $result = mysqli_query($link, $sql);
    header('Location: books.php');
    exit();
}


if (isset($_GET['delete_book']) && is_numeric($_GET['delete_book'])){
    $id = htmlspecialchars($_GET['delete_book']);
    $sql = "DELETE FROM books WHERE id=$id";
    $result = mysqli_query($link, $sql);
    header('Location: books.php');
    exit();
}



// review

if (!empty($_POST["review_add"]??'')){
    $Person_id = htmlspecialchars($_POST["Person_id"]);
    $Book_id = htmlspecialchars($_POST["Book_id"]);
    $Review_date = htmlspecialchars($_POST["Review_date"]);
    $Review = htmlspecialchars($_POST["Review"]);

    $sql = "INSERT INTO reviews
    (Person_id, Book_id, Review_date, Review)
    VALUES
    ('$Person_id', '$Book_id', '$Review_date', '$Review')";

    $result = mysqli_query($link, $sql);
    header('Location: reviews.php');
    exit();
}

if (!empty($_POST["review_edit"]??'')){
    $id = htmlspecialchars($_POST["id"]);
    $Person_id = htmlspecialchars($_POST["Person_id"]);
    $Book_id = htmlspecialchars($_POST["Book_id"]);
    $Review_date = htmlspecialchars($_POST["Review_date"]);
    $Review = htmlspecialchars($_POST["Review"]);

    // UPDATE `reviews` SET `Book_id` = 'Swift12' WHERE id = 3;

    $sql = "UPDATE reviews SET
    Person_id='$Person_id',
    Book_id='$Book_id',
    Review_date='$Review_date',
    Review='$Review'
    WHERE id=$id";

    $result = mysqli_query($link, $sql);
    header('Location: reviews.php');
    exit();
}


if (isset($_GET['delete_review']) && is_numeric($_GET['delete_review'])){
    $id = htmlspecialchars($_GET['delete_review']);
    $sql = "DELETE FROM reviews WHERE id=$id";
    $result = mysqli_query($link, $sql);
    header('Location: reviews.php');
    exit();
}