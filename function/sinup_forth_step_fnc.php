<?php
include 'db.php';
    if(isset($_POST['next'])){
        if(!isset($_SESSION['security_question']) || !isset($_SESSION['security_answer'])){
            echo "ARE YOU SURE YOU DONT WANT TO UPLOAD THIS BLAH BLAH BALH?";
        }else{
            $email = $_SESSION['email'];
            $password = $_SESSION['password'];
            $username = $_SESSION['username'];
            $fname = $_SESSION['fname'];
            $lname = $_SESSION['lname'];
            $bday = $_SESSION['bday'];
            $gender = $_SESSION['gender'];
            $location = $_SESSION['location'];
            if($_SESSION['typeOFaccount'] == "MEMBER"){
                $typeOFaccount = "member_account";
            }else{
                $typeOFaccount = "author_account";
            }
            // $security_question = $_SESSION['security_question'];
            // $security_answer = $_SESSION['security_answer'];
            $create_new_account = mysqli_query($conn, "INSERT INTO $typeOFaccount (email, `password`, fname, lname, birthday, gender)
            VALUES ('$email', '$password' , '$fname', '$lname', '$bday' , '$gender')");
            
            session_destroy();

            echo "<script>
            window.location.assign('successful.php');
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