<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view.css">
    <title>Document</title>
    
 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php
        require '../db.php';
        $id = $_SESSION['ID'];
        $admin_infos = mysqli_query($conn, "SELECT * FROM admin_account WHERE adminID = $id");

        while ($results = mysqli_fetch_assoc($admin_infos)) {
            
        
    ?>
   <div class="container">
        <nav>
            <p class="CompanyName">Book <span>Room</span></p>
            <img src="../../images/logo.jpg" alt="">
            <h2>GRAY</h2>
            <p>owner</p>
            
            <a href="../admin_dashboard.php"><button type="button">Dashboard</button></a>
            <a href="../admin_analytics.php"><button type="button">Analytics</button></a>
            <a href=""><button type="button" class="active">Accounts</button></a>
            <a href=""><button type="button">Books</button></a>

            <div class="logout">
                <a href="../logout.php"><button type="button">LOGOUT</button></a>
            </div>
        </nav>

        <article>
            <div class="logo">
                <div class="picLogo">
                    <img src="../../images/logo.jpg" alt="">
                </div>

                <div class="logoName">
                    <p>Book</p>
                    <p>Room</p>
                </div>
            </div>
            
           
            <?php
                // include '../db.php';
                $ids = $_GET['id'];
                $selectsMEMBER = mysqli_query($conn, "SELECT * FROM admin_account WHERE adminID = $ids");

                while ($memberINFO = mysqli_fetch_assoc($selectsMEMBER)) {
                    # code...
                 
            ?>
            <div class="mainContainer">
                <div class="dagdag">
                    <!-- DIV FOR BUTTONS ON TOP -->
                    <div class="buttonONtop">
                        <a href=""><button type="button" class="message"> Message</button></a>
                        <a href=""><button type="button" class="archive">Archive</button></a>
                        <a href="../admin_accounts.php"><button type="button" class="BACK">BACK</button></a>
                    </div>
                <div class="ewan">
                    <!-- DIV FOR PROFILE PICTURE -->
                    <div class="profilePIC">
                        <img src="../../images/logo.jpg" alt="">
                    </div>

                    

                    <!-- DIV FOR THE MAIN CONTENTS -->
                    <div class="section">
                        <div class="TOP_details">
                            <div class="nameANDbuttons">
                                <div class="TOP_name">
                                    <h1><?= $memberINFO['fname']?></h1>
                                    <p>Admin</p>
                                </div>
                                <div class="buttonsBellow">
                                    <button type="button" class="active">About</button>
                                    <button type="button" class="notActive">Recommendation</button>
                                </div>
                            </div>
                            <div class="favoriteAUTHOR">
                                <p>My Favorite AUTHOR</p>
                                <img src="../../images/logo.jpg" alt="">
                                <p class="name">NAME</p>
                            </div>
                        </div>

                        <div class="bottom_details">
                            <div class="left_details">
                                <div class="personal">
                                    <img src="../../images/Ground.jpg" alt="">
                                    <p>Personal Information</p>
                                </div>
                                <div class="personal_details">
                                    <pre>Birthday  : <span>Nov 07 2002</span></pre>
                                    <pre>Number   : <span>09064597681</span></pre>
                                    <pre>Gender   : <span>Male</span></pre>
                                </div>
                                <div class="bio">
                                    <p>Bio :</p>
                                </div>
                            </div>
                            <div class="right_details">
                                <div class="aboutTHEbook">
                                    <p>The Nightmare</p>
                                    <pre>Lorem ipsum dolor sit amet 
                        consectetur adipisicing elit. 
                        Error laudantium sequi 
                        doloremque nesciunt iusto 
                        consectetur nisi eius officia 
                        sunt iure, sed optio laboriosam, 
                        quia praesentium id, 
                        perferendis reprehenderit 
                        quam. Iste.</pre>
                                </div>
                                <div class="pictures">
                                    <p>Favorite Book</p>
                                    <img src="../../images/Ground.jpg" alt="">
                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

            </div>
            <?php
                }
            ?>
        </article>
   </div>

   <?php
        }
   ?>

</body>
</html>