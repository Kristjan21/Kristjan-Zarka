<!DOCTYPE html>
<?php
     include("includes/database.php");
    session_start();
    include("functions/functions.php");
    if(!isset($_SESSION['user'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{
    
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
        <div class="header-wrapper">
            <a href="index.php"><img src="images/pic1.png" alt="" id="logo"></a>
        </div>
    
        <div class="content-wrapper"></div>
        <div id="sidebar">
        
            <div id="sidebar-title">Profili im
            </div>

            <ul id="cats">
                <?php
                
               
                    $perdorues = $_SESSION['user'];
                    $merr_imazh = "select * from biznes where username='$perdorues'";
                    $ekzekuto_merr_imazh = mysqli_query($con, $merr_imazh);
                    $rresht_imazh = mysqli_fetch_array($ekzekuto_merr_imazh);

                    $imazh = $rresht_imazh['image'];

                    $emer = $rresht_imazh['name'];

                    echo "<p style='text-align:center'><img src='images/$imazh' width='100' height='100'></p>";
                    echo "<p style='text-align:center'><b>$emer</b></p>";
                ?>
                <li><a href="myaccount.php?home">Kreu</a></li>
                <li><a href="myaccount.php?edit_account">Ndrysho profilin</a></li>
                <li><a href="myaccount.php?ndryshopassword">Ndrysho password</a></li>
                <li><a href="myaccount.php?fshiaccount">Fshi profilin</a></li>
                <li><a href="logout.php">Dil</a></li>
                
            </ul>
            

            

        </div>
        

        <div class="content-area">
        
            <div id="events_box">
                
                <?php 
                    if(isset($_GET['edit_account'])){
                        include("edit_account.php");
                    }
                    if(isset($_GET['ndryshopassword'])){
                        include("ndryshopassword.php");
                    }
                    if(isset($_GET['fshiaccount'])){
                        include("fshiaccount.php");
                    }
                    if(isset($_GET['home'])){
                        include("home.php");
                    }
                ?>
               
            </div>
                    
        </div>
        


        <div id="footer">
            <p>&copy;Kristjan Zarka</p>
        </div>
    </div>
</body>
</html>
                <?php }?>



