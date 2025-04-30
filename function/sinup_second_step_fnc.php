<?php
    if(isset($_POST['next'])){
        $_SESSION['fname'] = $_POST['fname'];
        $_SESSION['lname'] = $_POST['lname'];
        $_SESSION['bday'] = $_POST['bday'];

        echo "<script>
        window.location.assign('signupThird_step.php');
        </script>";
    }

    if(isset($_POST['back'])){
        session_destroy();
        echo "<script>
            window.location.assign('login.php');
        </script>";
    }
?>