<?php
    if(isset($_POST['addBookButton'])){
        $title = $_POST['title'];
        $authorname = $_POST['authorname'];
        $genre = $_POST['genre'];
        $description = $_POST['description'];
        $language = $_POST['language'];
        $date_published = $_POST['date-published'];
        $authorIDS = $_SESSION['ID'];

        $addnewBOOK = mysqli_query($conn, "INSERT INTO books (Title, category, About, `language`, date_published, authorID, status) 
        VALUES ('$title', '$genre', '$description', '$language', '$date_published', $authorIDS, 'available')");
    }
?>