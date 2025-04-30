<?php
    session_start();
    include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor | Book Room</title>

    <!-- Icon Import -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!--Web Icon-->
    <link rel="shortcut icon" href="../images/weblogo.png" type="image/x-icon">

    <!--CSS Stylesheets-->
    <link rel="stylesheet" href="css/bg-and-nav.css">
    <link rel="stylesheet" href="css/book-view.css">

</head>
<body>
    <!--Logo and Title -->
    <header class ="logo-and-title">
        <img src="../images/weblogo.png" alt="book room logo">
        <h2>Book<br><span style="color: #A1BE95;">Room</span></h2>
    </header>
    <?php
         require 'db.php';
         $id = $_SESSION['ID'];
         $admin_infos = mysqli_query($conn, "SELECT * FROM author_account WHERE authorID = $id");
 
         while ($results = mysqli_fetch_assoc($admin_infos)) {
             
    ?>
    <!-- Navigations Panel-->
    <div class="sidebar">
        <h1>Book <span style="color: #A1BE95;">Room</span></h1>
        <div class="profile">
            <img src="../images/<?php echo $results['profile_pic']?>" alt="Profile Picture">
            <h2><?= $results['fname']?></h2>
            <p>Editor</p>
            <hr>
        </div>
        <div class="menu">
            <a href="Editor-Dashboard.php"><button class="text-btn">Dashboard</button></a>
            <a href="Editor-Books.php"><button class="chosen-btn">Books</button></a> 
            <a href="Editor-AddBooks.php"><button class="text-btn">Add Books</button></a> 
            <a href="Editor-BooksOwned.php"><button class="text-btn">Book Owned</button></a>
            <br><br><br><br><br><br><br><br><br>
            <a href="Editor-Accounts.php"><button class="text-btn">Account</button> </a>
            <a href="function/logout.php"><button class="logout">Logout</button></a>
        </div>
    </div>

    <!--
    
        Main Content
        - Upper Content (Book Picture, Name, Title, Back Button)
        - Left Details (Description)
        - right Details (Author, Language, Date Published)
    
                    -->
    <?php
    $IDS = $_GET['bookid'];
    $selectBOOK_info = mysqli_query($conn, "SELECT * FROM books WHERE bookID= $IDS");

    while ($BOOKS_INFO = mysqli_fetch_assoc($selectBOOK_info)) {
        # code...
    
    ?>
    <div class="content-part">
        <div class="upper-content">
            <img src="../images/<?= $BOOKS_INFO['bookCOVER']?>" alt="The Escapers">
            <div class="title-and-author">
                <h1><?= $BOOKS_INFO['Title']?></h1>
                <h4>
                    <?php
                        $autID = $BOOKS_INFO['authorID'];
                        $select_the_name = mysqli_query($conn, "SELECT fname FROM author_account WHERE authorID = $autID");

                        while ($theNAME = mysqli_fetch_assoc($select_the_name)) {
                            echo $theNAME['fname'];
                        }
                    ?>
                </h4>
            </div>
            <a href="Editor-Books.php">
                <button>Back</button>
            </a>
        </div>
        <div class="section-bg">
            <div class="divider"></div>
            <div class="details-part">  
                <div class="left-details">
                    <h4>Description</h4>
                    <p><?= $BOOKS_INFO['About']?>
                    </p>
                </div>
                <div class="right-details">
                    <h4>Editor</h4>
                    <p>
                    <?php
                        $autID = $BOOKS_INFO['authorID'];
                        $select_the_name = mysqli_query($conn, "SELECT fname FROM author_account WHERE authorID = $autID");

                        while ($theNAME = mysqli_fetch_assoc($select_the_name)) {
                            echo $theNAME['fname'];
                        }
                    ?>
                    </p>
                    <h4>Language</h4>
                    <p><?= $BOOKS_INFO['language']?></p>
                    <h4>Date Published</h4>
                    <p><?= $BOOKS_INFO['date_published']?></p>
                </div>
            </div>
        </div>
    </div>
        <?php
    }
        ?>
    <?php
         }
    ?>
</body>
</html>