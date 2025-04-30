<?php
include 'db.php';
    if(isset($_POST['next'])){
        $_SESSION['username'] = $_POST['username'];
        $email = $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['typeOFaccount'] = $_POST['typeOFaccount'];

        $checks_if_email_exist = mysqli_query($conn, "SELECT * FROM author_account WHERE email ='$email'");
        $checks_if_email_exist_admin = mysqli_query($conn, "SELECT * FROM admin_account WHERE email ='$email'");


        if (mysqli_num_rows($checks_if_email_exist) > 0) {
            // echo "meron";
        }elseif (mysqli_num_rows($checks_if_email_exist_admin) > 0) {
            # code...
        }
        else{
            echo "<script>
            window.location.assign('signupSecond_step.php');
        </script>"; 
        }
        
        

        

        
    }
    if(isset($_POST['back'])){
        session_destroy();
        echo "<script>
            window.location.assign('login.php');
        </script>";
    }
?>