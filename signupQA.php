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
        include 'function/signupQA.php';
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
                <div class="head">
                    <h2>Add security to</h2>
                    <h2> your account</h2>
                </div>
                <form action="" method="post">
                    <select name="security_question" required >
                        <option value="<?php if (isset($_SESSION['security_question'])) {
                                    echo $_SESSION['security_question'];}?>">
                            <?php
                                if (isset($_SESSION['security_question'])) {
                                    echo $_SESSION['security_question'];
                                }else{
                                    echo "Security Question";
                                }
                            ?>
                        </option>
                        <option value="Who is you best friend ?">Who is you best friend ?</option>
                        <option value="Where did you graduated in elementary school ?">Where did you graduated in elementary school ?</option>
                    </select>
                    <input type="text" name="security_answer"  placeholder="Answer" required
                    value="<?php if(isset($_SESSION['security_answer'])){echo $_SESSION['security_answer'];}?>">
                    
                  
                    <div class="prev_sub">
                        <a href="signupForth_step.php" ><p>GO BACK</p></a>
                        <button type="submit" name="next" class="faceRecognitionButton">Submit</button>
                    </div>
                    
                    <div class="signs">
                        <p>Something went wrong?</p>
                        <a href="administrator.html"><p>Contact administrator here.</p></a>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</body>
</html>