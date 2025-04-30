<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_analytics_most_popular.css">
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
                <a href=""><button type="button">LOGOUT</button></a>
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
                    <div class="breadBrumbs">
                        <p><a href="admin_analytics.php">Analytics</a> > Most Popular Author</p>
                    </div>
                   <div class="scrolldable">
                        <table>
                            <tr>
                                <th class="fth"></th>
                                <th>Author's Name</th>
                                <th>Number of Downloads</th>
                                <th class="rth">Rank</th>
                            </tr>
                            <?php
                                include 'db.php';
                                $selectTopTEN = mysqli_query($conn, "SELECT * FROM author_account ORDER BY downloaded_books DESC LIMIT 10");

                                while ($result = mysqli_fetch_assoc($selectTopTEN)) {
                                    
                                
                            ?>
                            <tr>
                                <td><img src="../images/<?=$result['profile_pic'];?>" alt=""></td>
                                <td><?= $result['fname'];?></td>
                                <td><?= $result['downloaded_books'];?></td>
                                <td style="color: gold;"><?php
                                $nums = mysqli_num_rows($selectTopTEN); 
                                for ($i=1; $i <2; $i++) { 
                                    echo $i;
                                }                                
                                ?></td>
                            </tr>
                            <?php
                                }
                            ?>
                          
                        </table>
                   </div>
           
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