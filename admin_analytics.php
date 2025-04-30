<?php
    include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_analytics.css">
    <title>Document</title>
</head>
<body>
   <div class="container">
        <nav>
            <p class="CompanyName">Book <span>Room</span></p>
            <img src="../images/logo.jpg" alt="">
            <h2>GRAY</h2>
            <p>owner</p>
            
            <a href="admin_dashboard.php"><button type="button">Dashboard</button></a>
            <a href=""><button type="button" class="active">Analytics</button></a>
            <a href="admin_accounts.php"><button type="button">Accounts</button></a>
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
                <div class="content">
                    <div class="Firstlayer">

                        <!-- MOST POPULAR AUTHOR  -->
                        <a href="admin_analytics_most_popular.php">
                            <?php
                                $TheMostPopularAUTHOR = mysqli_query($conn, "SELECT * FROM author_account ORDER BY downloaded_books DESC LIMIT 1");

                                while ($popularAUTHOR = mysqli_fetch_assoc($TheMostPopularAUTHOR)) {
                                    # code...
                                
                            ?>
                            <div class="box1">
                                <div class="text">
                                    <p>Most Popular Author</p>
                                </div>
                                <div class="align">
                                    <p><?= $popularAUTHOR['fname'];?></p>
                                    <img src="../images/<?= $popularAUTHOR['profile_pic'];?>" alt="">
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                        </a>
                        <!-- END OF MOST POPULAR AUTHOR  -->


                        <!-- MOST LIKED BOOKS -->
                        <a href="admin_analytics_most_like_book.php">
                            <div class="box2">
                                <div class="text">
                                    <p>Most Liked Books</p>
                                </div>
                                <div class="align">
                                    <p>The Romance</p>
                                    <img src="../images/logo.jpg" alt="">
                                </div>
                            </div>
                        </a>
                        <!-- END OF THE MOST LIKED BOOKS -->


                        <!-- PEOPLES CHOICE -->
                        <a href="admin_analytics_peoples_chioce.php">
                            <div class="box3">
                                <div class="text">
                                    <p>People’s Choice</p>
                                </div>
                                <div class="align">
                                    <p>Spaces Between Us</p>
                                    <img src="../images/logo.jpg" alt="">
                                </div>
                            </div>
                        </a>
                        <!-- END OF PEOPLES CHOICE -->


                    </div>
                    <div class="Secondlayer">
                        <div class="box4">
                            <div class="p">
                                <p>Total Book</p>
                                <p>Downloads</p>
                            </div>
                            <p class="num">999</p>
                        </div>
                        <div class="box5" onclick="CurrentUSER()">
                            <div class="p">
                                <p>Current User</p>
                                <p>Count</p>
                            </div>
                            <p class="num">
                                <?php
                                    $userCurrentCOUNT = mysqli_query($conn, "SELECT * FROM admin_account");
                                    $authorCurrentCOUNT = mysqli_query($conn, "SELECT * FROM author_account");

                                    echo $counts = mysqli_num_rows($authorCurrentCOUNT) + mysqli_num_rows($userCurrentCOUNT);
                                   
                                ?>
                            </p>

                        </div>
                        <div class="box6" onclick="PageADMINS()">
                            <div class="p">
                                <p>Total Admin Accounts</p>
                            </div>
                            <p class="num">
                                <?php
                                    $userCurrentCOUNT = mysqli_query($conn, "SELECT * FROM admin_account");
                                    echo mysqli_num_rows($userCurrentCOUNT);
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="CurrentUSER" id="CurrentUSER">
                <a href=""><p style="font-size: 20px; font-weight: bolder;">x</p></a>
                <div class="heds">
                    <p style="font-size: 25px; font-weight: bold; color: white;">CURRENT USER</p>
                    <div class="search">
                        <img src="../images/logo.jpg" alt="">
                        <input type="search" name="" id="">
                    </div>
                </div>

                <table>
                    <tr>
                        <th>NAME</th>
                        <th>EMAIL</th>
                    </tr>
                    <tr>
                        <td>DUMMY NAME</td>
                        <td>DUMMYEMAIL@EMAIL.COM</td>
                    </tr>
                    <tr>
                        <td>DUMMY NAME</td>
                        <td>DUMMYEMAIL@EMAIL.COM</td>
                    </tr>
                    <tr>
                        <td>DUMMY NAME</td>
                        <td>DUMMYEMAIL@EMAIL.COM</td>
                    </tr>
                    <tr>
                        <td>DUMMY NAME</td>
                        <td>DUMMYEMAIL@EMAIL.COM</td>
                    </tr>
                    <tr>
                        <td>DUMMY NAME</td>
                        <td>DUMMYEMAIL@EMAIL.COM</td>
                    </tr>
                    <tr>
                        <td>DUMMY NAME</td>
                        <td>DUMMYEMAIL@EMAIL.COM</td>
                    </tr>
                    <tr>
                        <td>DUMMY NAME</td>
                        <td>DUMMYEMAIL@EMAIL.COM</td>
                    </tr>
                    <tr>
                        <td>DUMMY NAME</td>
                        <td>DUMMYEMAIL@EMAIL.COM</td>
                    </tr>
                    <tr>
                        <td>DUMMY NAME</td>
                        <td>DUMMYEMAIL@EMAIL.COM</td>
                    </tr>
                    <tr>
                        <td>DUMMY NAME</td>
                        <td>DUMMYEMAIL@EMAIL.COM</td>
                    </tr>
                    <tr>
                        <td>DUMMY NAME</td>
                        <td>DUMMYEMAIL@EMAIL.COM</td>
                    </tr>

                </table>
                
            </div>

            <div class="PageADMINS" id="PageADMINS">
                <a href=""><p style="font-size: 20px; font-weight: bolder;">x</p></a>
                <div class="heds">
                    <p style="font-size: 25px; font-weight: bold; color: white;">PAGE EDITORS</p>
                    <div class="search">
                        <img src="../images/logo.jpg" alt="">
                        <input type="search" name="" id="">
                    </div>
                </div>

                <table>
                    <tr>
                        <th>NAME</th>
                        <th>EMAIL</th>
                    </tr>
                    <tr>
                        <td>DUMMY NAME</td>
                        <td>DUMMYEMAIL@EMAIL.COM</td>
                    </tr>
                    <tr>
                        <td>DUMMY NAME</td>
                        <td>DUMMYEMAIL@EMAIL.COM</td>
                    </tr>
                    <tr>
                        <td>DUMMY NAME</td>
                        <td>DUMMYEMAIL@EMAIL.COM</td>
                    </tr>
                    <tr>
                        <td>DUMMY NAME</td>
                        <td>DUMMYEMAIL@EMAIL.COM</td>
                    </tr>
                    <tr>
                        <td>DUMMY NAME</td>
                        <td>DUMMYEMAIL@EMAIL.COM</td>
                    </tr>
                    <tr>
                        <td>DUMMY NAME</td>
                        <td>DUMMYEMAIL@EMAIL.COM</td>
                    </tr>
                    <tr>
                        <td>DUMMY NAME</td>
                        <td>DUMMYEMAIL@EMAIL.COM</td>
                    </tr>
                    <tr>
                        <td>DUMMY NAME</td>
                        <td>DUMMYEMAIL@EMAIL.COM</td>
                    </tr>
                    <tr>
                        <td>DUMMY NAME</td>
                        <td>DUMMYEMAIL@EMAIL.COM</td>
                    </tr>
                    <tr>
                        <td>DUMMY NAME</td>
                        <td>DUMMYEMAIL@EMAIL.COM</td>
                    </tr>
                    <tr>
                        <td>DUMMY NAME</td>
                        <td>DUMMYEMAIL@EMAIL.COM</td>
                    </tr>

                </table>
                
            </div>
        </article>
   </div>

   <script>

    let openCurrentUSER = document.getElementById('CurrentUSER');
    let openPageADMINS = document.getElementById('PageADMINS');



    function CurrentUSER(){
        openCurrentUSER.classList.add("open_popup");
    }

    function PageADMINS(){
        openPageADMINS.classList.add("open_popup");
    }

    function removepop(){
        openCurrentUSER.classList.remove("open_popup");
    }

    
   </script>
</body>
</html>