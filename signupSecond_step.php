<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        include 'function/sinup_second_step_fnc.php';
    ?>
    <div class="container">
        <div class="picture">
            <!-- <div class="LOGIN_SIGNUP">
                <a href=""><p>Login</p></a>
                <a href=""><p>Sign up</p></a>
            </div> -->

            <div class="needed_content">
                <h1>BOOK <span>ROOM</span></h1>
                <img src="images/logo.jpg">
                <p class="text">Discover, Download, and Dive into</p>
                <p class="text">Stories Across Many Genres!</p>
                <div class="link">
                    <p>All Rights Reserved</p>
                    <p>2024-2025</p>
                </div>
                
            </div>
        </div>

        <div class="form">
            <div class="logo">
                <img src="images/logo.jpg" alt="">
                <p>book.<span>room</span></p>
            </div>

            <div class="forms">
                <h1>Sign Up</h1>
                <form action="" method="post">
                    <input type="text" name="fname" id="" placeholder="First name"
                    value="<?php if(isset($_SESSION['fname'])){echo $_SESSION['fname'];}?>" required>
                    <input type="text" name="lname" id="" placeholder="Last name"
                    value="<?php if(isset($_SESSION['lname'])){echo $_SESSION['lname'];}?>" required>
                    <label for="">Birthday</label>
                    <input type="date" name="bday" id=""
                    value="<?php if(isset($_SESSION['bday'])){echo $_SESSION['bday'];}?>" required>
                  
                    <div class="prev_next">
                        <a href="signup.php" ><p>GO BACK</p></a>
                        <button type="submit" name="next">NEXT</button>
                    </div>
                    
                </form>
                <form method="post" class="sign">
                        <p>Already have an account? <button type="submit" name="back">Login</button></p>
                </form>
            </div>
        </div>
        
    </div>
</body>
</html>