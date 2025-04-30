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
        include 'archive_authorAccount.php';
        require '../db.php';
        $id = $_SESSION['ID'];
        $admin_infos = mysqli_query($conn, "SELECT * FROM admin_account WHERE adminID = $id");

        while ($results = mysqli_fetch_assoc($admin_infos)) {
            
        
    ?>
    <div class="loader"></div>
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
                include '../db.php';
                $ids = $_GET['id'];
                $selectsMEMBER = mysqli_query($conn, "SELECT * FROM author_account WHERE authorID = $ids");

                while ($memberINFO = mysqli_fetch_assoc($selectsMEMBER)) {
                    # code...
                 
            ?>
            <div class="mainContainer">
                <div class="dagdag">
                    <!-- DIV FOR BUTTONS ON TOP -->
                    <form method="post" class="buttonONtop">
                        <a href=""><button type="button" class="message"> Message</button></a>
                        <button type="button" class="archive" onclick="open_popup()" name="arch">Archive</button>
                        <a href="../admin_accounts.php"><button type="button" class="BACK">BACK</button></a>
                    </form>
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
                                    <p><?= $memberINFO['downloaded_books']?><span> Downloaded Books</span></p>
                                </div>
                                <div class="buttonsBellow">
                                    <button type="button" class="active">About</button>
                                    <button type="button" class="notActive">Recommendation</button>
                                </div>
                            </div>
                            <div class="favoriteAUTHOR">
                                <p>My Favorite AUTHOR</p>
                                <img src="../../images/logo.jpg" alt="">
                                <p class="name">
                                <?php
                                        if(empty($memberINFO['fav_author_name'])){
                                            ?>
                                            Name
                                            <?php
                                        }else{
                                            echo $memberINFO['fav_author_name'];
                                        }
                                    ?>
                                </p>
                            </div>
                        </div>

                        <div class="bottom_details">
                            <div class="left_details">
                                <div class="personal">
                                <?php
                                        if(empty($memberINFO['fav_author_pic'])){
                                            ?>
                                            <img src="../../images/Ground.jpg" alt="">
                                            <?php
                                        }else{
                                            ?>
                                            <img src="../../images/<?= $memberINFO['fav_author_pic']?>" alt="">
                                            <?php
                                        }
                                    ?>
                                    
                                    <p>Personal Information</p>
                                </div>
                                <div class="personal_details">
                                    <pre>Birthday  : <span><?= $memberINFO['birthday']?></span></pre>
                                    <pre>Number   : <span><?php if($memberINFO['phone_number'] == 0){echo "None";}else{echo $memberINFO['phone_number'];}
                                    ?></span></pre>
                                    <pre>Gender   : <span><?php if(empty($memberINFO['gender'])){echo "None";}else{echo $memberINFO['gender'];}
                                    ?></span></pre>
                                </div>
                                <div class="bio">
                                    <p>Bio :</p>
                                </div>
                            </div>
                            <div class="right_details">
                                <div class="aboutTHEbook">
                                    <p>
                                    <?php
                                        if(empty($memberINFO['fav_book_title'])){
                                            ?>
                                            The Nightmare
                                            <?php
                                        }else{
                                            echo $memberINFO['fav_book_title'];
                                        }
                                    ?>
                                    </p>
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
                                    <?php
                                        if(empty($memberINFO['fav_book_cover'])){
                                            ?>
                                            <img src="../../images/Ground.jpg" alt="">
                                            <?php
                                        }else{
                                            ?>
                                            <img src="../../images/<?= $memberINFO['fav_book_cover']?>" alt="">
                                            <?php
                                        }
                                    ?>
                            
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


        <div class="blackBackground" id="popUP" onclick="removePOP()">
            <div class="popUP" id="popUP_message">
            <div class="close" onclick="removePOP()">
                X
            </div>
            <div class="logoPIC">
                <img src="" alt="">
            </div>
            <div class="confirmation">
                <h1>Are you sure you want to to this account in Archive?      
                </h1>
            </div>

            <div class="twoButtons">
                <button type="button" class="cancel" onclick="removePOP()">Cancel</button>
                <form action="" method="post">
                    <button type="submit" class="removes" name="arch">Archive</button>
                </form>
            </div>
        </div>
        </div>

      <script>
            var popUP = document.getElementById('popUP');
            var popUP_message = document.getElementById('popUP_message');

            function open_popup() {
                popUP.style.display = 'block';
                popUP_message.style.display = 'block';
            }

            function removePOP(){
                popUP.style.display = 'none';
                popUP_message.style.display = 'none';
            }

        
      </script>

<div class="loader" id="loader"></div>

<script>
  
    const element = document.getElementById('loader');
    element.addEventListener('animationend', () => {
        if (element.style.animationIterationCount === '5') {
            element.style.display = 'none';
        }
    });

</script>
</body>
</html>