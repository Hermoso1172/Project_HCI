<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Document</title>
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
            <img src="..\images\<?php echo $results['profile_pic'] ?>" alt="">
            <h2>
                <?php
                    if(strlen($results['fname']) < 6){
                        echo $results['fname'];
                    }
                    else{
                        echo substr($results['fname'], 0, 4)."...";
                    }                
                ?>
            </h2>
            <p>owner</p>
            
            <a href=""><button type="button" class="active">Dashboard</button></a>
            <a href="admin_analytics.php"><button type="button">Analytics</button></a>
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
            
            <div class="time">
                <div class="times">
                    <p class="bold">DATE AND TIME</p>
                    <p>10/25/2024 | 24:00</p>
                </div>
            </div>

            <div class="mainContainer">
                <div class="content">
                    <div class="firstLayer">
                        <div class="Piechart">
                            <p>BOOKS IN LIBRARY</p>
                        </div>

                        <div class="totalBooks">
                            <div class="total_books">
                                <p class="numberOFbook">656</p>
                                <p>TOTAL BOOK</p>
                                <p>COUNT</p>
                            </div>
                           
                            <div class="totalCategogy">
                                <p class="numberOFcategory">75</p>
                                <p>TOTAL</p>
                                <p>CATEGORIES</p>
                            </div>
                        </div>
                    </div>

                    <div class="secondLayer">
                        <div class="topBooks">
                            <p>TOP BOOKS</p>
                            <div class="list_TOPBOOK">
                                <table>
                                    <tr>
                                        <th>Rank</th>
                                        <th>Book Name</th>
                                        <th>Date Published</th>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="topAuthor">
                            <p>TOP AUTHORS</p>
                            <div class="firstThree">
                            <?php
                                    $all_author = mysqli_query($conn, "SELECT * FROM author_account ORDER BY downloaded_books DESC LIMIT 3");

                                    while ($authors_infos = mysqli_fetch_assoc($all_author)) {
                                        
                                    
                                ?>
                                <div class="firstPic">
                                    <img src="../images/logo.jpg" alt="">
                                    <p><?php echo $authors_infos['fname'] ?></p>
                                </div>

                                <?php
                                    }
                                ?>
                            </div>
                            <div class="twoPic">
                                <div class="firstPic">
                                    <img src="../images/logo.jpg" alt="">
                                    <p>Name</p>
                                </div>
                                <div class="firstPic">
                                    <img src="../images/logo.jpg" alt="">
                                    <p>Name</p>
                                </div>  
                            </div>
                        </div>
                    </div>

                    <div class="thirdLayer">
                        <p>RECENT LOGS</p>
                        <table>
                            <tr>
                                <th>TIMESTAMP</th>
                                <th>USER ID</th>
                                <th>ACTION</th>
                            </tr>
                            <?php
                                    $selects_logs = mysqli_query($conn, "SELECT * FROM recent_logs ORDER BY The_time DESC");

                                    while ($recent_logs = mysqli_fetch_assoc($selects_logs)) {
                                        # code...
                                    
                                ?>
                            <tr>
                               
                                <td><?php echo $recent_logs['timestamp']; ?></td>
                                <td><?php echo $recent_logs['ID']; ?></td>
                                <td><?php echo $recent_logs['ACTION'];?></td>
                               
                            </tr>
                            <?php
                                    }
                                ?>
                        </table>
                    </div>
                </div>
            </div>
        </article>
   </div>

   <?php
        }
   ?>
</body>
</html>