<?php
    session_start();
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
    <link rel="stylesheet" href="css/dashboard.css">

</head>
<body>
    <?php
         require 'db.php';
         $id = $_SESSION['ID'];
         $admin_infos = mysqli_query($conn, "SELECT * FROM author_account WHERE authorID = $id");
 
         while ($results = mysqli_fetch_assoc($admin_infos)) {
             
    ?>
    <!--Logo and Title -->
    <header class ="logo-and-title">
        <img src="../../images/weblogo.png" alt="book room logo">
        <h2>Book<br><span style="color: #A1BE95;">Room</span></h2>
    </header>

    <!-- Navigations Panel-->
    <div class="sidebar">
        <h1>Book <span style="color: #A1BE95;">Room</span></h1>
        <div class="profile">
            <img src="../images/<?php echo $results['profile_pic'] ?>" alt="Profile Picture">
            <h2><?= $results['fname']?></h2>
            <p>Editor</p>
            <hr>
        </div>
        <div class="menu">
            <a href="Editor-Dashboard.php"><button class="chosen-btn">Dashboard</button></a>
            <a href="Editor-Books.php"><button class="text-btn">Books</button></a> 
            <a href="Editor-AddBooks.php"><button class="text-btn">Add Books</button></a> 
            <a href="Editor-BooksOwned.php"><button class="text-btn">Book Owned</button></a>
            <br><br><br><br><br><br><br><br><br>
            <a href="Editor-Accounts.php"><button class="text-btn">Account</button> </a>
            <a href="function/logout.php"><button class="logout">Logout</button></a>
        </div>
    </div>

    <!--Main Content-->
    <div class="dashboard-content">
        <div class="right-content">
            <?php
                $yourBooks = mysqli_query($conn, "SELECT * FROM books WHERE authorID = $id AND status='available' ORDER BY downloaded_books DESC LIMIT 1");

                if (mysqli_num_rows($yourBooks) > 0) {
                    # code...
                
                while ($highestBook = mysqli_fetch_assoc($yourBooks)) {
                    # code...
                
            ?>
            <div class="high-download-content">
                <div class="download-content">
                    <img src="../images/<?= $highestBook['bookCOVER']?>" alt="highest download book">
                    <div class="content-right-wrapper">
                        <p><b>YOUR MOST DOWNLOADED BOOK</b></p>
                        <h2><?= $highestBook['Title']?></h2>
                        <input type="number" name="" id="mostDownloadedBook" value="<?= $highestBook['downloaded_books'];?>" hidden>
                        <p>WITH OVER <span class="highlight-number"><?= $highestBook['downloaded_books']?></span> DOWNLOADS</p>
                    </div>
                    <button onclick="openPopupMost(); MostCounterAnimation()">View book</button>
                </div>
            </div>
            <?php
                }
            }else{
                ?>
                    <div class="high-download-content">
                        <div class="download-content">
                            <img src="../images/book-1.png" alt="highest download book">
                            <div class="content-right-wrapper">
                                <p><b>YOUR MOST DOWNLOADED BOOK</b></p>
                                <h2>You doesnt have book yet</h2>
                                <span>Publish your book now!</span>
                            </div>
                            <a href="Editor-AddBooks.php"><button type="button">Add book</button></a>
                        </div>
                    </div>
                <?php
            }
            ?>
            <?php
                $your_lowest_Books = mysqli_query($conn, "SELECT * FROM books WHERE authorID = $id AND status='available' ORDER BY downloaded_books ASC LIMIT 1");
                if (mysqli_num_rows($your_lowest_Books) > 0) {
                while ($lowestBook = mysqli_fetch_assoc($your_lowest_Books)) {
                    # code...
                
            ?>
            <div class="low-download-content">
                <div class="download-content">
                    <img src="../images/<?= $lowestBook['bookCOVER']; ?>" alt="lowest download book">
                    <div class="content-right-wrapper">
                        <p><b>YOUR LEAST DOWNLOADED BOOK</b></p>
                        <h2><?=$lowestBook['Title'];?></h2>
                        <input type="number" name="" id="leastDownloadedBook" value="<?= $lowestBook['downloaded_books'];?>" hidden>
                        <p>WITH ONLY HAVING <span class="highlight-number"><?= $lowestBook['downloaded_books'];?></span> DOWNLOADS</p>
                    </div>
                    <button onclick="openPopupLeast(); LeastCounterAnimation()">View book</button>
                </div>
            </div>
        </div>
        <?php
                }
            }else{
                ?>
                    <div class="low-download-content">
                        <div class="download-content">
                        <img src="../images/book-1.png" alt="highest download book">
                            <div class="content-right-wrapper">
                                <p><b>YOUR LEAST DOWNLOADED BOOK</b></p>
                                <h2>You doesnt have book yet</h2>
                                <span>Publish your book now!</span>
                            </div>
                            <a href="Editor-AddBooks.php"><button type="button">Add book</button></a>

                        </div>
                    </div>
                </div>
                <?php
            }
        ?>

        <div class="left-content">
            <div class="download-content">
                <img src="../images/publish.png" alt="publish book logo">
                <div class="content-left-wrapper">
                    <h2>
                    <input type="number" id="vala" value="<?= $results['total_books_posted'];?>" hidden>
                        <b id="published-counter">0</b>
                    </h2>
                    <h4>Total Book Published</h4>
                </div>
            </div>
            <div class="download-content">
                <img src="../images/download.png" alt="total book logo">
                <div class="content-left-wrapper">
                    <h2>
                        <input type="number" id="vala2" value="<?= $results['downloaded_books'];?>" hidden>
                        <b id="download-counter"></b>
                    </h2>
                    <h4>Total Downloads of Books</h4>
                </div>
            </div>
            
        </div>
    </div>
    <?php
         }
    ?>
    <!-- Popup Modal -->
    <div id="popup-modal" class="popup-modal">
            <?php
                $yourBookspopup = mysqli_query($conn, "SELECT * FROM books WHERE authorID = $id ORDER BY downloaded_books DESC LIMIT 1");
                while ($highestBookpopup = mysqli_fetch_assoc($yourBookspopup)) {
                    # code...
                
            ?>
        <div class="popup-content">
            <span class="close-button" onclick="closePopupMost()">&times;</span>
            <div class="popup-layout">
                <!-- Left Side -->
                <div class="left-side">
                    <h3><i class="fa-solid fa-book"></i>YOUR MOST DOWNLOADED BOOK</h3>
                    <img src="../images/<?= $highestBookpopup['bookCOVER'];?>" alt="Most Downloaded Book">
                </div>
                <!-- Right Side -->
                <div class="right-side">
                    <h2><?= $highestBookpopup['Title'];?></h2>
                    <p>
                        <?= $highestBookpopup['About'];?>
                    </p>
                    <p class ="total-downloads">WITH OVER <span class="highlight-number"><b  id="popup-most-counter">0</b></span> DOWNLOADS</p>
                </div>
            </div>
        </div>
            <?php
                }
            ?>
    </div>

        <!-- Popup Modal Least -->
        <div id="popup-modal-least" class="popup-modal">
        <?php
                $your_lowest_Bookspopup = mysqli_query($conn, "SELECT * FROM books WHERE authorID = $id ORDER BY downloaded_books ASC LIMIT 1");
                while ($lowestBookpopup = mysqli_fetch_assoc($your_lowest_Bookspopup)) {
                    # code...
                
            ?>
            <div class="popup-content">
                <span class="close-button" onclick="closePopupLeast()">&times;</span>
                <div class="popup-layout">
                    <!-- Left Side -->
                    <div class="left-side">
                        <h3><i class="fa-solid fa-book"></i>YOUR LEAST DOWNLOADED BOOK</h3>
                        <img src="../images/<?= $lowestBookpopup['bookCOVER'];?>" alt="Most Downloaded Book">
                    </div>
                    <!-- Right Side -->
                    <div class="right-side">
                        <h2> <?= $lowestBookpopup['Title'];?></h2>
                        <p>
                            <?= $lowestBookpopup['About'];?>
                        </p>
                        <p class ="total-downloads">WITH ONLY <span class="highlight-number-2"><b  id="popup-least-counter">0</b></span> DOWNLOADS</p>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>   

    <!-- Scripts -->
    <script src="js/dashboard-animate-counter.js"></script>
    <script src="js/popup-modal.js"></script>

</body>
</html>