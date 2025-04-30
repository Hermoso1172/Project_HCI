<?php
$id = $_SESSION['ID'];

    // CHANGE PERSONAL INFORMATION PART
    if(isset($_POST['updatePERSONALinfo'])){
        $gender = $_POST['gender'];
        $location = $_POST['location'];
        mysqli_query($conn, "UPDATE author_account 
        SET gender='$gender', `location` = '$location' 
        WHERE authorID = $id");

        echo "<script>
            window.location.assign('Editor-Accounts.php');
        </script>";
    }

    // CHANGE CREDENTIAL PART 
    if(isset($_POST['updateCREDENTIALS'])){
        $email = $_POST['UPDATE_email'];
        $phone = $_POST['UPDATE_phone'];
        $question = $_POST['UPDATEsecurity_question'];
        $answer = $_POST['UPDATEsecurity_answer'];

        mysqli_query($conn, "UPDATE author_account 
        SET email ='$email', phone_number = '$phone', security_question = '$question', security_answer = '$answer'
        WHERE authorID = $id");

        echo "<script>
        window.location.assign('Editor-Accounts.php');
        </script>";
    }

    // CHANGE PASSWORD
    if(isset($_POST['changePASS'])){
        $OLDpass = $_POST['OLDpass'];
        $NEWpass = $_POST['NEWpass'];
        $CONFIRMpass = $_POST['CONFIRMpass'];
     
         $changepass = mysqli_query($conn, "SELECT * FROM author_account WHERE authorID = $id");
 
         while ($changingpass = mysqli_fetch_assoc($changepass)) {
            if($OLDpass != $changingpass['password']){
                // INPUTTED PASSWORD DID NOT MATCH TO CURRENT PASSWORD
            }else{
                if($NEWpass != $CONFIRMpass){
                //    THE NEW PASSWORD AND THE CONFIRM PASSWORD DID NOT MATCH
                }else{
                    mysqli_query($conn, "UPDATE author_account 
                    SET `password` = '$NEWpass'
                    WHERE authorID = $id");

                    echo "<script>
                    window.location.assign('Editor-Accounts.php');
                    </script>";
                }
            }
        }
    }
?>