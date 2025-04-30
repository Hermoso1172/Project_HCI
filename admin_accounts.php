<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_accounts.css">
    <title>Document</title>
    
 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php
        require 'db.php';
        $id = $_SESSION['ID'];
        $admin_infos = mysqli_query($conn, "SELECT * FROM admin_account WHERE adminID = $id");

        while ($results = mysqli_fetch_assoc($admin_infos)) {
            
        
    ?>
   <div class="container">
        <nav>
            <p class="CompanyName">Book <span>Room</span></p>
            <img src="../images/logo.jpg" alt="">
            <h2>GRAY</h2>
            <p>owner</p>
            
            <a href="admin_dashboard.php"><button type="button">Dashboard</button></a>
            <a href="admin_analytics.php"><button type="button">Analytics</button></a>
            <a href=""><button type="button" class="active">Accounts</button></a>
            <a href=""><button type="button">Books</button></a>

            <div class="logout">
                <a href="logout.php"><button type="button">LOGOUT</button></a>
            </div>
        </nav>

        <article>
            <div class="logo">
                <div class="picLogo">
                    <img src="../../images/weblogo.png" alt="">
                </div>

                <div class="logoName">
                    <p>Book</p>
                    <p>Room</p>
                </div>
            </div>
            
           
            
            <div class="mainContainer">
                <div class="ewan">
                <form method="post" class="header" >
                    <button type="submit" name="MEMBER" id="MEMBER">MEMBER</button>
                    <button type="submit" class="AUTHOR" name="AUTHOR" id="AUTHOR">AUTHOR</button>
                </form>
                <div class="content">
                
                    <!-- HEADER -->
                    <div class="containerHeader">
                        
                  
                        <form method="post" class="anotherHeader">
                            <p>Sort</p>
                            
                            <select name="orderBY" onchange="this.form.submit()">
                                <option value="ID">ID</option>
                                <option value="NAME">NAME</option> 
                            </select>
                        </form>
                        <div class="search">
                            <img src="../images/logo.jpg" alt="">
    
                            <input type="search" name="" id="">
                        </div>

                        
                    </div>

                    <!-- TABLE -->
                    <div class="table">
                        <table>
                            <tr>
                                <th>USER ID</th>
                                <th>FULL NAME</th>
                                <th>EMAIL</th>
                                
                                <th>BIRTHDAY</th>
                                <th>ACTION</th>
                            </tr>
                            <?php

                              if (isset($_POST['MEMBER']) || isset($_POST['AUTHOR'])) {
                                # code...
                              

                                
                                if(isset($_POST['MEMBER'])){
                                    $tableName = "admin_account";
                                    echo "<script>
                                            var element = document.getElementById('MEMBER');
                                            var buttonAuthor = document.getElementById('AUTHOR');

                                            element.style.borderBottomLeftRadius = '0';
                                            element.style.borderBottomRightRadius = '0';
                                            buttonAuthor.style.backgroundColor = ' rgb(138, 138, 138)';
                                            
                                            
                                        </script>";

                                      

                                        $author_infos = mysqli_query($conn, "SELECT * FROM $tableName");
                                while ($result = mysqli_fetch_assoc($author_infos)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $result['adminID'];?></td>
                                            <td><?php echo $result['fname']; ?></td>
                                            <td><?php echo $result['email']; ?></td>
                                        
                                            <td><?php echo $result['birthday'];?></td>
                                            <td><button type="button">asd</button>
                                        </tr>
                                    <?php
                                }
                                }

                                // LIST OF AUTHORS ACCOUNT
                                elseif(isset($_POST['AUTHOR'])){
                                    $tableName = "author_account";
                                    echo "<script>
                                            var element = document.getElementById('MEMBER');
                                            var buttonAuthor = document.getElementById('AUTHOR');

                                            buttonAuthor.style.borderBottomLeftRadius = '0';
                                            buttonAuthor.style.borderBottomRightRadius = '0';
                                            element.style.backgroundColor = ' rgb(138, 138, 138)';
                                            buttonAuthor.style.backgroundColor = ' white';
                                            
                                            
                                        </script>";

                                $author_infos = mysqli_query($conn, "SELECT * FROM $tableName");
                                while ($result = mysqli_fetch_assoc($author_infos)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $result['authorID'];?></td>
                                            <td><?php echo $result['fname']; ?></td>
                                            <td><?php echo $result['email']; ?></td>
                                        
                                            <td><?php echo $result['birthday'];?></td>
                                            <td><a href="view_account/view_author.php?id=<?=$result['authorID']?>"><button type="button">VIEW</button></a></td>
                                        </tr>
                                    <?php
                                }
                                }
                                                                  
                            ?>
                            
                            <?php
                                
                            
                              }else{
                              $author_infos = mysqli_query($conn, "SELECT * FROM admin_account");
                              while ($result = mysqli_fetch_assoc($author_infos)) {
                                ?>
                                <tr>
                                            <td><?php echo $result['adminID'];?></td>
                                            <td><?php echo $result['fname']; ?></td>
                                            <td><?php echo $result['email']; ?></td>
                                        
                                            <td><?php echo $result['birthday'];?></td>
                                            <td><a href="view_account/view_member.php?id=<?= $result['adminID']?>"><button type="button">VIEW</button></a></td>
                                        </tr>
                                <?php
                              }}
                            ?>

                        </table>
                    </div>

                    <!-- BUTTONS -->
                    <div class="asd" id="asd">
                        <div class="button">
                            <button type="button" class="print">PRINT</button>
                            <button type="submit" class="addAccount" id="addAccount" onclick="Opens()">ADD ACCOUNT</button>
                            <div class="open" id="open">
                                <a href=""><p style="font-size: 20px; font-weight: bolder;">x</p></a>
                                <div class="user">
                                    <p>USER ID</p>
                                    <div class="ids">
                                        <p>1</p>
                                    </div>
                                    <img src="../images/logo.jpg" alt="">
                                </div>

                                <div class="neededInfo">
                                    <p id="">FULL NAME</p>
                                    <input type="text" name="" id="OPEN_name">
                                    <p>EMAIL</p>
                                    <input type="email" name="" id="" placeholder="DUMMYEMAIL@EMAIL.COM">
                                    <p>PHONE NUMBER</p>
                                    <input type="number" name="" id="" placeholder="+639389001154">
                                    <p>BIRTHDAY</p>
                                    <input type="date" name="" id="">
                                </div>

                                <div class="buttons">
                                    <button type="button" class="change" onclick="ChangePASS()">
                                        CHANGE PASSWORD
                                    </button>

                                    <button type="button" class="delete" onclick="deleting()">
                                        DELETE
                                    </button>

                                    <button type="button" class="edit" onclick="saves()">
                                        SAVE
                                    </button>
                                </div>
                            </div>


                            <!-- POP UP WHEN YOU CLICK "CHANGE PASSWORD" BUTTON -->
                            <div class="ChangePASS" id="ChangePASS">
                                <a href=""><p style="font-size: 20px; font-weight: bolder;">x</p></a>
                                <p style="font-size: 25px; font-weight: bold; display: flex;  justify-content: center;">CHANGE PASSWORD</p>
                                <div class="neededInfo">
                                    <p>NEW PASSWORD</p>
                                    <input type="password" name="" id="" placeholder="New Password">
                                    <p>CONFIRM PASSWORD</p>
                                    <input type="password" name="" id="" placeholder="Old Password">
                                </div>
                                <button type="button" class="UPDATE" onclick="removepop()">UPDATE</button>
                            </div>
                            <!-- POP UP WHEN YOU CLICK "CHANGE PASSWORD" BUTTON -->


                            <div class="deleting" id="deleting">
                                <a href=""><p style="font-size: 20px; font-weight: bolder;">x</p></a>
                                <p style="font-size: 25px; font-weight: bold; display: flex;  justify-content: center;">DELETE ACCOUNT</p>
                                <div class="neededInfo1">
                                    <br>
                                    <p>ARE YOU SURE TO DELETE </p>
                                    <p>ACCOUNT USER ID “1”?</p>
                                    <br>
                                    <p>THIS WILL REFLECT </p>
                                    <p>IMMEDIATELY IN THE RECORDS.</p>
                                </div>
                                <div class="bots">
                                    <button type="button" onclick="removepop()" style="background-color: #FF0000;">DELETE</button>
                                    <button type="button" onclick="removepop()" style="background-color: #B6D3FF;">CANCEL</button>
                                </div>
                            </div>
                        </div>
                    </div>

                                <!-- ADD ACCOUNTS -->
                                 <?php
                                    include 'add_Account.php';
                                 ?>
                            <form action="#" method="post" class="opens" id="opens">
                                <a href=""><p style="font-size: 20px; font-weight: bolder;">x</p></a>
                                <div class="user">
                                    <p>ADD ACCOUNT</p>
                                </div>

                                <div class="neededInfo">
                                    <div class="fNmae">
                                    
                                        <div class="IDS">
                                            <p>TYPE</p>
                                            <select name="user" id="">
                                                <option value="">SELECT</option>
                                                <option value="reader">USER</option>
                                                <option value="admin">ADMIN</option>
                                                <option value="author">EDITORS</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="fNmae">
                                        <p>FULL NAME</p>
                                        <input type="text" name="fname" id="" placeholder="DUMMY NAME" required>
                                    </div>
                                    <div class="fNmae">
                                        <p>EMAIL</p>
                                        <input type="email" name="email" id="" placeholder="DUMMYEMAIL@EMAIL.COM" required>
                                    </div>
                                    <div class="fNmae">
                                        <p>PASSWORD</p>
                                        <input type="password" name="pass" id="" placeholder="Password" required>
                                    </div>
                                    <div class="fNmae">
                                        <p>CONFIRM PASSWORD</p>
                                        <input type="password" name="Repass" id="" placeholder="Confirm Password" required>
                                    </div>
                                </div>

                                <div class="buttons">
                                    <button type="button" class="delete" onclick="removepop()">
                                        CLOSE
                                    </button>

                                    <button type="submit" name="edit" class="edit">
                                        CREATE
                                    </button>
                                </div>
                            </form>


                            
                    

                    
                </div>
                </div>
                
            </div>
            
        </article>
   </div>

   <?php
        }
   ?>

<script>
     $(document).on('click','.update',function(e) {
        var fname=$(this).attr("data-id");
        // var idUser=$(this).attr("data-idUser");
        // var course=$(this).attr("data-course");
        // var mentor=$(this).attr("data-mentor");
        // var coursetitle=$(this).attr("data-coursetitle");

        $('#OPEN_name').val(fname);
        // $('#dataidUser').val(idUser);
        // $('#trainees_activity').val(course);
        // $('#mentorname').val(mentor);
        // $('#coursetitle').val(coursetitle);

    });
    </script>

   <script>
    let openPOP = document.getElementById('open');
    let opensPOP = document.getElementById('opens');

    let openChangePASS = document.getElementById('ChangePASS');
    let openDELETE = document.getElementById('deleting');


    function opens(){
        openPOP.classList.add("open_popup");
        
        var input = document.getElementById('OPEN_name').value;
        input.innerHTML = "asd";
            
    }

    function Opens(){
        opensPOP.classList.add("open_popup");

    }

    function ChangePASS(){
        openChangePASS.classList.add("open_popup");
        openPOP.classList.remove("open_popup");
    }

    function removepop(){
        openChangePASS.classList.remove("open_popup");
        openDELETE.classList.remove("open_popup");
        opensPOP.classList.remove("open_popup");

    }

    function saves(){
        openPOP.classList.remove("open_popup");

    }

    function deleting(){
        openDELETE.classList.add("open_popup");
        openPOP.classList.remove("open_popup");
    }

    
   </script>
</body>
</html>