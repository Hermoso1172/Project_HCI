<?php
if(isset($_POST['archives'])){
    $BOOKid = $_POST['BOOKid'];
    $AUTHORid = $_POST['AUTHORid'];
    mysqli_query($conn, "UPDATE books SET `status` = 'archive' 
    WHERE bookID = $BOOKid");

    mysqli_query($conn, "UPDATE author_account SET `total_books_posted` = `total_books_posted` - 1 
    WHERE authorID = $AUTHORid");

    echo "<script>
        window.location.assign('Editor-BooksOwned.php');
    </script>";
}elseif(isset($_POST['setAvailable'])){
    $BOOKid = $_POST['BOOKid'];
    $AUTHORid = $_POST['AUTHORid'];
    mysqli_query($conn, "UPDATE books SET `status` = 'available' 
    WHERE bookID = $BOOKid");

    mysqli_query($conn, "UPDATE author_account SET `total_books_posted` = total_books_posted + 1 
    WHERE authorID = $AUTHORid");
    echo "<script>
        window.location.assign('Editor-BooksOwned.php');
    </script>";
}
?>