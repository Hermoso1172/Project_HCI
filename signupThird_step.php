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
        include 'function/sinup_third_step_fnc.php';
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
                    <label for="">Gender</label>
                    <select name="gender" id="" required>
                    <option value="<?php if (isset($_SESSION['gender'])) {
                                    echo $_SESSION['gender'];}?>">
                            <?php
                                if (isset($_SESSION['gender'])) {
                                    echo $_SESSION['gender'];
                                }else{
                                    echo "Select Gender";
                                }
                            ?>
                        </option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <label for="">Location</label>

                    <select name="location" id="" required>
                    <option value="<?php if (isset($_SESSION['location'])) {
                                    echo $_SESSION['location'];}?>">
                            <?php
                                if (isset($_SESSION['location'])) {
                                    echo $_SESSION['location'];
                                }else{
                                    echo "Select Your Location";
                                }
                            ?>
                        </option>
                        <option value="Metro Manile">Metro Manila</option>
                        <option value="Nothern Luzon">Nothern Luzon</option>
                        <option value="Visayas">Visayas</option>
                        <option value="Mindanao">Mindanao</option>
                    </select>

                    <div class="prev_next">
                        <a href="signupSecond_step.php"><p>GO BACK</p></a>
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