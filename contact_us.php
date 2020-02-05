<!DOCTYPE html>
<?php 
    include("functions/functions.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tirana Nightlife</title>
    <link rel="stylesheet" href="styles/style.css" media="all">
</head>
<body>
    <div class="wrapper">
        <div class="menubar">  
            
        <ul id="menu">
                <li><a href="index.php"><img src="images/pic1.png" alt="logo" id="logo" height="70px;"></a></li>    
        </ul>
        <ul id="menu" style="margin-top: 25px;">
                <li><a href="index.php">Kreu</a></li>
                <li><a href="login.php">Regjistrohuni</a></li>
                <li><a href="contact_us.php">Kontakt</a></li>
                <li><a href="aboutus.php">Rreth nesh</a></li>
            </ul>
            <div id="form">
                <form action="results.php" method="get" enctype="multipart/form-data">
                    <input type="text" name="user_query" placeholder="Kerko per event...">
                    <input type="submit" name="search" value="Kerko">
                </form>
            </div>
            
        </div>

        <div id="sidebar">
        
            <div id="sidebar-title">Kategorite
            </div>

            <ul id="cats">
                <?php merrKategorite(); ?>
            </ul>


            <div id="sidebar-title">Ditet
            </div>
            
            <ul id="cats">
            <?php merrDitet(); ?>
            </ul>

        </div>

        <div class="content-area" >
        <div id="shopping_cart">
            <span style=" font-size:18px; padding:5px;  line-height:40px;">
                Rregulli Numer 1: Party!! Eventet Javore
            </span>
        </div>
            <div id="events_box" >
            <p><a class="kont" href="#">Cel: +335 68 576 2233</p>
            <p><a class= "kont" href="https://www.instagram.com/kristian.kz/?hl=en">Instagram: kristian.kz</p>
            <p><a class="kont" href="https://www.facebook.com/">Facebook: Kristjan Zarka</p>
           <p> <a class="kont" href="mailto:kzarka30@gmail.com">Email: kzarka30@gmail.com</p>
        
            </div>
        </div>

        <div id="footer">
            <p>&copy;Kristjan Zarka 2020</p>
        </div>
    </div>
</body>
</html>