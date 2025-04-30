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
        include 'function/signup_function.php';
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
                    <input type="text" name="username" id="" placeholder="Username" 
                    value="<?php if(isset($_SESSION['username'])){echo $_SESSION['username'];}?>" required>
                    <input type="email" name="email" id="" placeholder="Email" required
                    value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];}?>">
                    <input type="password" name="password" id="" placeholder="Password" required
                    value="<?php if(isset($_SESSION['password'])){echo $_SESSION['password'];}?>">
                    <select name="typeOFaccount" id="">
                        <option value="<?php if (isset($_SESSION['typeOFaccount'])) {
                                    echo $_SESSION['typeOFaccount'];}?>">
                            <?php
                                if (isset($_SESSION['typeOFaccount'])) {
                                    echo $_SESSION['typeOFaccount'];
                                }else{
                                    echo "Type of account";
                                }
                            ?>
                        </option>
                        <option value="MEMBER">MEMBER</option>
                        <option value="AUTHOR">AUTHOR</option>
                    </select>
                    <div class="prev_next" style="align-self:end;">
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