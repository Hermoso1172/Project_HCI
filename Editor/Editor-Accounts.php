<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor | Book Room</title>

    <!-- Web page Icon -->
    <link rel="shortcut icon" href="../images/weblogo.png" type="image/x-icon">

    <!-- Icon Import -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="css/bg-and-nav.css">
    <link rel="stylesheet" href="css/accounts.css">

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
            <h2><?= $results['fname']?></h2>
            <p>Editor</p>
            <hr>
        </div>
        <div class="menu">
            <a href="Editor-Dashboard.php"><button class="text-btn">Dashboard</button></a>
            <a href="Editor-Books.php"><button class="text-btn">Books</button></a> 
            <a href="Editor-AddBooks.php"><button class="text-btn">Add Books</button></a> 
            <a href="Editor-BooksOwned.php"><button class="text-btn">Book Owned</button></a>
            <br><br><br><br><br><br><br><br><br>
            <a href="Editor-Accounts.php"><button class="chosen-btn">Account</button> </a>
            <a href="function/logout.php"><button class="logout">Logout</button></a>
        </div>
    </div>
    <?php
        include '../Editor/function/edit_account.php';
        ?>

    <!--
    
        Main Content
        - Personal Information
        - Picture, Name & User ID
        - Account Credentials
        - Update Profile Popup
        - Update Credentials Popup
        - Change Password Popup

                -->

    <div class="main-content">
        <div class="personal-information-part">
            <div class="personal-information-content">
                <h3>Personal Information</h3>
                <div class = "text-box">
                    <h4><?= $results['birthday'];?></h4>
                    <p>Birthdate</p>
                </div>
                <div class = "text-box">
                    <h4><?php
                        if(empty($results['gender'])){
                            echo "Not provided";
                        }else{
                            echo $results['gender'];
                        }
                    ?></h4>
                    <p>Gender</p>
                </div>
                <div class = "text-box">
                    <h4><?php
                        if(empty($results['location'])){
                            echo "Not provided";
                        }else{
                            echo $results['location'];
                        }
                    ?></h4>
                    <p>Location</p>
                </div>
                <button id="openModal1">
                        <i class="fa-regular fa-pen-to-square"></i> Edit
                </button>
            </div>
        </div>
        
        <div class="right-side-part">
            <div class="picture-name-userid-part">
                <img src="../images/<?= $results['profile_pic']?>" alt="Profile Picture">
                <h1><?= $results['fname'];?></h1>
                <div class="user-id">
                    <p>User ID</p>
                    <div class="userid-background">
                        <h2><?= $results['authorID'];?></h2>
                    </div>
                </div>
            </div>
            <div class="user-credentials">
                <div class="credentials-left">
                    <h2  class ="space">Account Credentials</h2>
                    <div class="divider">
                        <h3>Email</h3>
                        <div class="credentials-text-box">
                            <h4><?= $results['email'];?></h4>
                        </div>
                        <h3>Phone Number</h3>
                        <div class="credentials-text-box">
                            <h4><?php
                                if($results['phone_number'] == 0){
                                    echo "Not Provided";
                                }else{
                                    echo $results['phone_number'];
                                }
                            ?></h4>
                        </div>
                        <h3>Secondary Email</h3>
                        <div class="credentials-text-box">
                            <h4>gray2@email.com</h4>
                        </div> <br> 
                    </div>
                </div>
                <div class="credentials-right">
                    <h3>Security Question</h3>
                    <div class="credentials-text-box">
                        <h4><?php
                            if(empty($results['security_question'])){
                                echo "Not provided";
                            }else{
                                echo $results['security_question'];
                            }
                        ?></h4>
                    </div>
                    <div class="buttons">
                            <button id="openModal2">
                                <i class="fa-regular fa-pen-to-square"></i> Update
                            </button>
                            <button id="openModal3">
                                <i class="fa-regular fa-pen-to-square"></i> Change Password
                            </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals for Button -->

    <!-- Update Personal Information -->
    <div id="modal1" class="modal">
        <form class="modal-content" method="post">
            <span class="close" id="closeModal1">&times;</span>
            <h2>Update Profile Info</h2>
            <div class="section">
                <div class="left-side">
                    First Name<br> <input type="text" placeholder="<?= $results['fname'];?>"> <br>
                    Last Name<br><input type="text"> <br>
                    Gender <br>
                    <select name="gender" id="">
                        <option value="<?php 
                            if(empty($results['gender'])){
                            }else{
                                echo $results['gender'];
                            }
                        ?>"><?php 
                            if(empty($results['gender'])){
                                echo "Not provided, Please select gender";
                            }else{
                                echo $results['gender'];
                            }
                        ?></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select> <br>
                    Location  <br>
                    <select name="location" id="">
                    <option value="<?php 
                            if(empty($results['location'])){
                            }else{
                                echo $results['location'];
                            }
                        ?>"><?php 
                            if(empty($results['location'])){
                                echo "Not provided, Please select location";
                            }else{
                                echo $results['location'];
                            }
                        ?></option>
                        <option value="Metro Manila">Metro Manila</option>
                        <option value="Visayas">Visayas</option>
                        <option value="Mindanao">Mindanao</option>
                    </select> <br>
                    Birthdate  <br>
                    <input type="date" name="birthdate" id="birthdate" value="<?= $results['birthday']?>"> <br>
                </div>
                <div class="right-side-1">
                    Upload New Profile Picture <br>
                    <input type="file" name="" id="">
                </div>
            </div> <br> <br>
            <div class="button-container">
                <button id="cancel-button">Cancel</button>
                <button type="submit" id="update-button" name="updatePERSONALinfo">Update</button>
            </div>
        </form>
    </div>

    <!-- Update Credentials -->
    <div id="modal2" class="modal">
        <form method="post" class="modal-content">
            <span class="close" id="closeModal2">&times;</span>
            <h2>Update Credentials</h2>
            <div class="section">
                <div class="left-side">
                    Email<br> <input type="email" name="UPDATE_email" value="<?= $results['email']?>"> <br>
                    Phone Number<br><input type="number" name="UPDATE_phone" placeholder="<?php
                                if($results['phone_number'] == 0){
                                    echo "Not Provided";
                                }else{
                                    echo $results['phone_number'];
                                }
                            ?>"> <br>
                    Secondary Email<br> <input type="email" placeholder="<?= $results['email']?>"> <br>
                </div>
                <div class="right-side">
                    Security Question <br>
                    <select name="UPDATEsecurity_question" id="">
                    <option value="<?php 
                            if(empty($results['security_question'])){
                            }else{
                                echo $results['security_question'];
                            }
                        ?>"><?php 
                            if(empty($results['security_question'])){
                                echo "Not provided Please select Security question";
                            }else{
                                echo $results['security_question'];
                            }
                        ?></option>
                        <option value="Who is your Mother?">Who is your Mother?</option>
                        <option value="What is your favorite color?">What is your favorite color?</option>
                        <option value="What is your birthplace?">What is your birthplace?</option>
                        <option value="What is your nickname?">What is your nickname?</option>
                    </select> <br>
                    Answer<br> <input type="text" name="UPDATEsecurity_answer" placeholder="<?php 
                            if(empty($results['security_answer'])){
                                echo "Enter your answer Here";
                            }else{
                                echo $results['security_answer'];
                            }
                        ?>"> <br>
                </div>
            </div> <br> <br>
            <div class="button-container">
                <button id="cancel-button">Cancel</button>
                <button id="update-button" type="submit" name="updateCREDENTIALS">Update</button>
            </div> 
        </form>
    </div>

    <!-- Change Password -->
    <div id="modal3" class="modal">
        <form method="post" class="modal-content-1">
            <span class="close" id="closeModal3">&times;</span>
            <h2>Update Password</h2>
            <div class="change-password">
                Old Password<br> <input type="password" name="OLDpass" required> <br>
                New Password<br><input type="password" name="NEWpass" required> <br>
                Confirm New Password<br><input type="password" name="CONFIRMpass" required> <br>
            </div>
            <div class="button-container-1">
                <button id="cancel-button">Cancel</button>
                <button type="submit" name="changePASS" id="update-button">Update</button>
            </div> 
        </form>
    </div>
    <?php
         }
    ?>
    <!-- Scripts -->
     <script src="js/accounts-popup.js"></script>

</body>
</html>