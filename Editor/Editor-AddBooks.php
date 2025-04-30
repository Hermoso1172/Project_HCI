<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor | Book Room</title>

    <!-- Web Icon-->
    <link rel="shortcut icon" href="../images/weblogo.png" type="image/x-icon">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="css/bg-and-nav.css">
    <link rel="stylesheet" href="css/addbooks.css">

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
        <?php
        include '../Editor/function/add_books_function.php';
        ?>
        <h1>Book <span style="color: #A1BE95;">Room</span></h1>
        <div class="profile">
            <img src="../images/<?= $results['profile_pic']?>" alt="Profile Picture">
            <h2><?= $results['fname']?></h2>
            <p>Editor</p>
            <hr>
        </div>
        <div class="menu">
            <a href="Editor-Dashboard.php"><button class="text-btn">Dashboard</button></a>
            <a href="Editor-Books.php"><button class="text-btn">Books</button></a> 
            <a href="Editor-AddBooks.php"><button class="chosen-btn">Add Books</button></a> 
            <a href="Editor-BooksOwned.php"><button class="text-btn">Book Owned</button></a>
            <br><br><br><br><br><br><br><br><br>
            <a href="Editor-Accounts.php"><button class="text-btn">Account</button> </a>
            <a href="function/logout.php"><button class="logout">Logout</button></a>
        </div>
    </div>

    <!--
    
        Main Content
        - Add Book Form
        - Title
        - Author & Genre
        - Language, Date Published
        - Add Front Cover & Author Photo
        - Add Back Cover
        - Book File Copy (PDF)
        - Popup Modal

                    -->

    <div class="form-background">
        <form class="form-container" enctype="multipart/form-data" method="post">
            <h3>Add a Book</h3>
            <div class="form-group-title" class="form-group">
                <label for="title">Title</label><br>
                <!-- TITLE -->
                <input type="text" name="title" id="title" placeholder="Add title here..." required>
            </div>
            
            <div class="form-group-author-genre" class="form-group">
                <label for="authorname">Author Name</label>
                <label for="genre" class ="genre-space">Genre</label> <br>

                <!-- AUTHOR NAME -->
                <input type="text" name="authorname" id="authorname" placeholder="Add author name here..." required>

                <!-- GENRE -->
                <select name="genre" id="genre" required>
                    <option value="">Choose...</option>
                    <option value="SCIENCE">Science</option>
                    <option value="NOVEL">Novel</option>
                    <option value="MYSTERY">Mystery</option>
                    <option value="NARRATIVE">Narrative</option>
                    <option value="FICTION">Fiction</option>
                    <option value="HISTORY">History</option>
                    <option value="FANTASY">Fantasy</option>
                </select>
            </div>
            
            <div>
                <label for="description">Description</label><br>
                <!-- DESCRIPTION -->
                <input type="text" name="description" id="description" placeholder="Add book description here..." required>
            </div>
            
            <div>
                <label for="language">Language</label>
                <label for="date-published" class = "date-published-space">Date Published</label><br>
                <!-- LANGUAGE -->
                <select name="language" id="language" required>
                    <option value="">Choose...</option>
                    <option value="English">English</option>
                    <option value="Filipino">Filipino</option>
                    <option value="Others">Others</option>
                </select>
                <!-- DATE PUBLISHED -->
                <input type="date" name="date-published" id="date-published" required>
            </div>
    
            <div class="bottom-part">
                <div class="file-upload-left">
                    <div class="file-upload-item">
                        <label for="front-upload">Front Cover</label>
                        <input type="file" name="front-upload" id="front-upload">
                    </div>
                    
                    <div class="file-upload-item">
                        <label for="back-upload">Back Cover</label>
                        <input type="file" name="back-upload" id="back-upload">
                    </div>
                    
                    <div class="file-upload-item">
                        <label for="book-file-upload">Book File Copy (PDF)</label>
                        <input type="file" name="book-file-upload" id="book-file-upload">
                    </div>
                </div>
                
                <div class="file-upload-right">
                    <div class="file-upload-item">
                        <label for="author-upload">Author Photo</label>
                        <input type="file" name="author-upload" id="author-upload">
                    </div>
                
                    <div class="submit-item">
                        <button type="submit" name="addBookButton" id="addBookButton">Add Book</button>
                    </div>
                    
                    <p class="form-footer"><span style="color: black;">book.</span><span style ="color: #A1BE95;">room</span></p>
                </div>
            </div>
            
            </div>
         </form>
    </div>

            <!-- The Modal -->
            <div id="addBookModal" class="modal">
                <div class="modal-content">
                    <span class="close" id="closeModal">&times;</span>
                    <div class="book-details">
                        <div>
                            <span id ="modal-genre">Genre</span>
                        </div>
                        <div>
                            <span id="modal-title">Title Name</span>
                        </div>
                        <div>
                            <span id="modal-author">Author Name</span>
                        </div>
                        <div class = "images">
                            <img src="../images/book-1.png" alt="" class = "space1">
                            <img src="../images/book-1.png" alt="" class = "space2">
                        </div>
                    </div> <br>

                    <div class="modal-actions">
                        <button id="editButton">Edit</button>
                        <button id="addButton">Add Book</button>
                    </div>
                </div>
            </div>
        <?php
         }
         
        ?>

    <!-- Scripts -->
     <!-- <script src="js/addbooks-popup.js"></script> -->

</body>
</html>