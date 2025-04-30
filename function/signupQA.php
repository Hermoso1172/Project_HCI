<?php
    if(isset($_POST['next'])){
        $_SESSION['security_question'] = $_POST['security_question'];
        $_SESSION['security_answer'] = $_POST['security_answer'];
        
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