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
            <div id="events_box">
            <p>Website i jep mundesi perdoruesit (<i>user</i>) te logohet si klient ose si subjekt qe ofron jeten e nates .
            Website duhet t’i japi mundesi subjektit te regjistrohet ne faqe dhe ky subjekt me pas mund te shtoi, fshi ose ndryshoi eventin si edhe te njoftohet per rezervimet ne evente.
            Te gjithe user-at mund te marrin informacion mbi website-in.
            User-at qe hyjne si klient mund te zgjedhin kategorine e eventeve, te zgjedhin eventin si edhe te marrin informacion mbi eventet e publikuara. Ata gjithashtu mund te rezervojne ose kontaktojne per nje event te zgjedhur.
            Permes nje dritareje search klientet mund te kerkojne eventet per te cilet jane te interesuar.
            Website-i duhet te kete nje Admin i cili do te mbikqyri faqen duke krijuar, fshire ose ndryshuar cdo gje ne faqe. Cdo event qe perdoruesi subjekt shton do te shfaqet ne faqe pas verifikimit nga Admini.
</p>
            
        
            </div>
        </div>

        <div id="footer">
            <p>&copy;Kristjan Zarka 2020</p>
        </div>
    </div>
</body>
</html>