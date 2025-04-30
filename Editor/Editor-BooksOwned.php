<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor | Book Room</title>

    <!-- Webpage Icon -->
    <link rel="shortcut icon" href="../images/weblogo.png" type="image/x-icon">

    <!-- Icon Import -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="css/bg-and-nav.css">
    <link rel="stylesheet" href="css/books-owned.css">

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
            <a href="Editor-Books.php"><button class="text-btn">Books</button></a> 
            <a href="Editor-AddBooks.php"><button class="text-btn">Add Books</button></a> 
            <a href="Editor-BooksOwned.php"><button class="chosen-btn">Book Owned</button></a>
            <br><br><br><br><br><br><br><br><br>
            <a href="Editor-Accounts.php"><button class="text-btn">Account</button> </a>
            <a href="function/logout.php"><button class="logout">Logout</button></a>
        </div>
    </div>

    <!--
    
        Main Content
        - Search Bar
        - Sorting Dropdown
        - List of Books Owned

                        -->

    <div class="main-content">

        <div class="top-content">

            <div class="sorting-dropdown">
                <select name="sorting-type" id="sorting-dropdown">
                    <option value="">Date Added</option>
                    <option value="">A - Z</option>
                    <option value="">Date Published</option>
                </select>
            </div>

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

        </div>

        <div class="books-owned-table">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Book Name</th>
                            <th>Date Published</th>
                            <th>Date Added</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example rows -->
                        <?php
                            $selectSCIENCE = mysqli_query($conn, "SELECT *, MONTH(date_published) ,DAY(date_published) ,YEAR(date_published) 
                            FROM books WHERE authorID = $id");

                            while ($openBOOKS = mysqli_fetch_assoc($selectSCIENCE)) {
                                # code...
                            
                        ?>
                        <tr>
                            <td><?= $openBOOKS['Title'];?></td>
                            <td><?php echo date("F", mktime(0, 0, 0, $openBOOKS['MONTH(date_published)'], 10)) 
                            ." " . $openBOOKS['DAY(date_published)'] . ","
                            . " ". $openBOOKS['YEAR(date_published)']?></td>
                            <td>January 1, 2025</td>
                            <?php
                                if($openBOOKS['status'] == 'archive'){
                                    ?>
                                    <td style="color: red;"><?= $openBOOKS['status'];?></td>
                                    <?php
                                }else{
                                    ?>
                                    <td style="color: green;"><?= $openBOOKS['status'];?></td>
                                    <?php
                                }
                            ?>
                            
                            <td>
                                <a href="Editor-BooksOwned-Archived.php?bookID=<?= $openBOOKS['bookID']?>">
                                    <button>View</button>
                                </a>
                            </td>
                        </tr>
                        <?php
                             }
                        ?>
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
            <?php
         }
            ?>
</body>
</html>