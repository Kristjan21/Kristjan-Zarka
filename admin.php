<?php
    session_start();

    if(!isset($_SESSION['admin'])){
        echo "<script>window.open('admin_login.php','_self')</script>";
    }else{
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="styles/admin_style.css">
</head>
<body>
    <div class="main_wrapper" >
        <div id="header" style="text-align:center;"><a href="admin.php" style="text-decoration:none; color:red;"><h1 style="text-align:center; padding-top:50px">Llogaria e Administratorit</h1></a></div>
        <div id="right">
            <h2 style="margin:6px; padding:6px; color:red;">Menaxho permbajtjen</h2>
            
            <a href="admin.php?shiko_eventet">Shiko  eventet</a>
            <a href="admin.php?shto_kategori">Shto kategori te re</a>
            <a href="admin.php?shiko_kategorit">Shiko kategorite</a>
            <a href="admin.php?shiko_klientet">Shiko klientet</a>
            <a href="logout.php">Dil</a>

        </div>
        <div id="left" >
            <?php
                if(isset($_GET['shiko_eventet'])){
                    include("shiko_eventet.php");
                }
                if(isset($_GET['shto_kategori'])){
                    include("shto_kategori.php");
                }
                if(isset($_GET['shiko_kategorit'])){
                    include("shiko_kategorit.php");
                }
                
                if(isset($_GET['shiko_klientet'])){
                    include("shiko_klientet.php");
                }
                
            ?>
        </div>
        
    </div>
</body>
</html>
<?php
} ?>
 
