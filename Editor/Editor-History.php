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
    <link rel="stylesheet" href="css/books.css">

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
            <img src="../images/<?= $results['profile_pic'];?>" alt="Profile Picture">
            <h2><?= $results['fname'];?></h2>
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
        - Search Bar
        - Navigation (Table Order and Genre)
        - Table
        - Pagination

                                    -->

    <!-- Search Bar -->
    <div class="search-bar">
        <a href="">
            <i id="mic-icon" class="fa-solid fa-microphone"></i>
        </a>
        <input type="search" name="searchbar" id="searchbar-field" placeholder="Search book name, author...">
        <a href="">
            <i id="search-icon" class="fa-solid fa-magnifying-glass"></i>
        </a>
    </div>


    <!-- Navigation -->
    <div class="navigations">
        <select name="Order" id="order-dropdown">
            <option value="Ascending">ASC</option>
            <option value="Descending">DESC</option>
        </select>
        <select name="Sort Type" id="sort-type-dropdown">
            <option value="">DEFAULT</option>
            <option value="">DOWNLOAD</option>
            <option value="">A - Z</option>
        </select>
        <ul>
            <li><a href="Editor-Books.php">Science</a></li>
            <li><a href="Editor-Novels.php">Novel</a></li>
            <li><a href="Editor-Mystery.php">Mystery</a></li>
            <li><a href="Editor-Narrative.php">Narrative</a></li>
            <li><a href="Editor-Fiction.php">Fiction</a></li>
            <li class="genre-selected"><a href="">History</a></li>
            <li><a href="Editor-Fantasy.php">Fantasy</a></li>
        </ul>
    </div>


    <!-- Table -->
    <table>
        <thead>
            <th>Book No.</th>
            <th>Title</th>
            <th>Author</th>
            <th>Downloads</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
                $selectSCIENCE = mysqli_query($conn, "SELECT * FROM books WHERE category = 'HISTORY'");
                if (mysqli_num_rows($selectSCIENCE) > 0) {
                    # code...
                while ($openBOOKS = mysqli_fetch_assoc($selectSCIENCE)) {
                    # code...
                   
                    
                
            ?>
            <tr>
                <td><?= $openBOOKS['bookID']?></td>
                <td><?= $openBOOKS['Title']?></td>
                <td>
                    <?php 
                        $autID = $openBOOKS['authorID'];
                        $fetchNAME = mysqli_query($conn,"SELECT fname FROM author_account WHERE authorID = $autID");

                        while ($AUTHORname = mysqli_fetch_assoc($fetchNAME)) {
                            echo $AUTHORname['fname'];
                        }
                    ?>
                </td>
                <td><?= $openBOOKS['downloaded_books'];?></td>
                <td>
                    <a href="Editor-Books-View.php?bookid=<?= $openBOOKS['bookID']?>">
                        <button class = "view-button">View</button>
                    </a>
                </td>
            </tr>
            <?php
                }
            }else {
                ?>
                    <tr>
                        <td colspan="5" style="color: red;">No Book posted yet</td>
                    </tr>
                <?php
            }
            ?>
           
        </tbody>
    </table>

    <!-- Table Pages -->
    <div class="pages">
        <ul>
            <li>
                <a href="">
                    <i class="fa-solid fa-chevron-left"></i>
                </a>
            </li>
            <li>
               <a href="" class = "current-page">
                    1
               </a>
            </li>
            <li>
                <a href="">
                    2
               </a>
            </li>
            <li>
                <a href="">
                    3
               </a>
            </li>
            <li>
                <a href="">
                    <i class="fa-solid fa-chevron-right"></i>
                </a>
            </li>
        </ul>
    </div>
            <?php
         }
            ?>
</body>
</html>