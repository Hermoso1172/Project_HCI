<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_analytics_most_like_book.css">
    <title>Document</title>
</head>
<body>
   <div class="container">
        <nav>
            <p class="CompanyName">Book <span>Room</span></p>
            <img src="i../mages/logo.jpg" alt="">
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
                        <p><a href="admin_analytics.php">Analytics</a> > Most Liked Books</p>
                    </div>
                   <div class="scrolldable">
                        <table>
                            <tr>
                                <th class="fth"></th>
                                <th>Title</th>
                                <th>Author's Name</th>
                                <th>Likes</th>
                                <th class="rth">Rank</th>
                            </tr>
                            <tr>
                                <td><img src="../images/logo.jpg" alt=""></td>
                                <td>Example Title here</td>
                                <td>William Shakespear</td>
                                <td>999</td>
                                <td style="color: gold;">1</td>
                            </tr>
                            <tr>
                                <td><img src="images/logo.jpg" alt=""></td>
                                <td>Example Title here</td>

                                <td>William Shakespear</td>
                                <td>999</td>
                                <td style="color: aqua;">2</td>
                            </tr>
                            <tr>
                                <td><img src="images/logo.jpg" alt=""></td>
                                <td>Example Title here</td>

                                <td>William Shakespear</td>
                                <td>999</td>
                                <td style="color: rgb(255, 106, 0);">3</td>
                            </tr>
                            <tr>
                                <td><img src="images/logo.jpg" alt=""></td>
                                <td>Example Title here</td>
                                <td>William Shakespear</td>
                                <td>999</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <td><img src="images/logo.jpg" alt=""></td>
                                <td>Example Title here</td>
                                <td>William Shakespear</td>
                                <td>999</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td><img src="images/logo.jpg" alt=""></td>
                                <td>Example Title here</td>
                                <td>William Shakespear</td>
                                <td>999</td>
                                <td>6</td>
                            </tr>
                            <tr>
                                <td><img src="images/logo.jpg" alt=""></td>
                                <td>Example Title here</td>
                                <td>William Shakespear</td>
                                <td>999</td>
                                <td>7</td>
                            </tr>
                            <tr>
                                <td><img src="images/logo.jpg" alt=""></td>
                                <td>Example Title here</td>
                                <td>William Shakespear</td>
                                <td>999</td>
                                <td>8</td>
                            </tr>
                            <tr>
                                <td><img src="images/logo.jpg" alt=""></td>
                                <td>Example Title here</td>
                                <td>William Shakespear</td>
                                <td>999</td>
                                <td>9</td>
                            </tr>
                            <tr>
                                <td><img src="images/logo.jpg" alt=""></td>
                                <td>Example Title here</td>
                                <td>William Shakespear</td>
                                <td>999</td>
                                <td>10</td>
                            </tr>
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