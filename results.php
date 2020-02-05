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
                <?php
                    if(isset($_GET['search'])){

                        $kerkim_query = $_GET['user_query'];
                        
                        $merr_event = "select * from events where emri_lokalit  like '%$kerkim_query%'";
                        $ekzekuto_query = mysqli_query($con,$merr_event);
                        $numero = mysqli_num_rows($ekzekuto_query);
                        if($numero==0){
                            echo "<h4>Nuk u gjeten rezultate per kerkimin tuaj! Ju lutem provoni nje emer tjeter!</h4>";
                        }
                        while($rresht_event= mysqli_fetch_array($ekzekuto_query)){
                            $event_id = $rresht_event['event_id'];
                            $event_kategori = $rresht_event['event_category'];
                            $event_dite = $rresht_event['event_day'];
                            $emri_lokalit = $rresht_event['emri_lokalit'];
                            $event_cmim = $rresht_event['event_price'];
                            $event_imazh = $rresht_event['event_image'];
                            
                            $event_fjalekyce = $rresht_event['event_keywords'];

                            echo "
                                    <div id='single_event'>
                                        <h3>$emri_lokalit</h3>
                                        
                                        <img src='admin_area/event_images/$event_imazh' width='180' height='180'>
                                        <p style='text-align:center'>Cmimi i biletes: $ $event_cmim</p>
                                        

                                        <a href='details.php?event_id=$event_id' style='float:left'>Detajet</a>
                

                                    </div>
                            
                            
                            ";
                        }
                    }
                ?>
                </div>
            </div>

            <div id="footer">
            <p>&copy;Kristjan Zarka 2020</p>
        </div>
    </div>
</body>
</html>