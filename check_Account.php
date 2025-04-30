<?php
session_start();
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        // CHECK IF INPUT SECTIONS ARE EMPTY
        if(empty($pass) && empty($email)){
            $_SESSION['error'] = '<script>document.getElementById("demo").innerHTML="Please Enter First!"</script>';
        }
        // IF USER DID NOT ENTER PASSWORD
        elseif (empty($pass) && !empty($email)) {
            $_SESSION['error'] = '<script>document.getElementById("demo").innerHTML="Please enter Password!"</script>';
        }
        // IF USER DID NOT ENTER EMAIL
        elseif (!empty($pass) && empty($email)) {
            $_SESSION['error'] = '<script>document.getElementById("demo").innerHTML="Please Enter Email!"</script>';
        }
        // IF USER ENTER PASSWORD AND EMAIL
        else{
            require 'db.php';
            $get_info_admin  = mysqli_query($conn, "SELECT * FROM admin_account WHERE email= '$email' AND `password`= '$pass'");

                // MALI ANG PASSWORD O KAYA ANG EMAIL
                if(mysqli_num_rows($get_info_admin) < 1){
                    $get_info_author  = mysqli_query($conn, 
                            "SELECT * FROM author_account WHERE email= '$email' AND `password`= '$pass'");
                            if(mysqli_num_rows($get_info_author) < 1){
                                $get_info_member  = mysqli_query($conn, 
                                "SELECT * FROM member_account WHERE email= '$email' AND `password`= '$pass'");
                                    if (mysqli_num_rows($get_info_member) < 1) {
                                    $_SESSION['error'] = '<script>document.getElementById("demo").innerHTML="User does not exist!"</script>';
                                        
                                    }else{
                                        while ($a = mysqli_fetch_assoc($get_info_member)) {
                                            $id = $a['memberID'];
                                            $_SESSION['ID'] = $id;
                                            
                                            date_default_timezone_set('Asia/Manila');
                                            $dateTime = date('m-d-Y h:i ');
                                            $sql33 = mysqli_query($conn, "INSERT INTO recent_logs (ID, `ACTION`, `timestamp`) VALUES ($id, 'Login', '$dateTime')");
                                            header('Location: Member/discover.php');
                                            }
                                    }
                                 
                               
                            }else{
                                while ($a = mysqli_fetch_assoc($get_info_author)) {
                                    $id = $a['authorID'];
                                    $_SESSION['ID'] = $id;
                                    
                                    date_default_timezone_set('Asia/Manila');
                                    $dateTime = date('m-d-Y h:i ');
                                    $sql33 = mysqli_query($conn, "INSERT INTO recent_logs (ID, `ACTION`, `timestamp`) VALUES ($id, 'Login', '$dateTime')");
                                    header('Location: Editor/Editor-Dashboard.php');
                                    }
                            }

                   
                }
                // TAMA ANG NILAGAY
                else{
                    while ($a = mysqli_fetch_assoc($get_info_admin)) {
                    $id = $a['adminID'];
                    $_SESSION['ID'] = $id;
                    
                    date_default_timezone_set('Asia/Manila');
					$dateTime = date('m-d-Y h:i ');
					$sql33 = mysqli_query($conn, "INSERT INTO recent_logs (ID, `ACTION`, `timestamp`) VALUES ($id, 'Login', '$dateTime')");
                    header('Location: ADMIN/admin_dashboard.php');
                    }
                }

            
        }
    }

?>