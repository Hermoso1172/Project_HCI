<?php
    if(isset($_POST['next'])){
        $_SESSION['gender'] = $_POST['gender'];
        $_SESSION['location'] = $_POST['location'];
        
        echo "<script>
        window.location.assign('signupForth_step.php');
        </script>";
    }

    if(isset($_POST['back'])){
        session_destroy();
        echo "<script>
            window.location.assign('login.php');
        </script>";
    }
?>