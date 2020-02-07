<html>
<?php
session_start();
    include("includes/database.php");
    
    include("functions/functions.php");

?>
    <head><title>Admin Login</title>
    <style>
    .log{
        margin:auto;
        width:250px;
        box-shadow:0px 8px 16px 0px rgba(0,0,0,0.9);
        padding: 80px 40px;
        margin-top:50px;
        background: linear-gradient(top, #3c3c3c 0%, #222222 100%);
        background: -webkit-linear-gradient(top,#3c3c3c 0%,#222222 100%);
    }
    h2{
        margin:0 0 30px 0;
        padding: 10px;
        color: #e92c2a;
        text-align:center;
    }
    input{
        width:100%;
        margin-bottom: 30px;
    }
    input[type=text],input[ type=password]{
        border: none;
        outline:none;
        border: 2px #fff solid;
        background: transparent;
        border-radius: 20px;
        box-sizing: border-box;
        color:#fff;
        font-size: 16px;
        padding: 10px;
        text-align: center;

    }
    .kristi{
        border: none;
        outline: none;
        padding: 10px;
        color: #fff;
        font-family: Arial;
        background:#ff267e;
        cursor: pointer;
        border-radius: 20px;
          }

    .kristi :hover{
        background: black;
        color: white;
    }
    

    </style></head>

    <link rel="stylesheet" href="styles/style.css" media="all">
    <body class="noku">
        <form action="" method="POST">
        <div class="log">
        <h2>Hyni si Admin</h2>
        <form>
        <input  type="text" id="admin" placeholder=" Admin username" name="admin" required>
        <input  type="password" id="pas" placeholder=" Admin password" name="pas" required>
        <input class="kristi" type="submit" name="login" value="Hyni">
        

        </form>
        </div>
           
        </form>
    </body></html>
    <?php 

            if(isset($_POST['login'])){
                $perdorues = $_POST['admin'];
                $fjalekalim = $_POST['pas'];
                
                $merr_admin = "select * from admin where password='$fjalekalim' AND username='$perdorues'";

                $ekzekuto_admin = mysqli_query($con, $merr_admin);

                $gjej_admin = mysqli_num_rows($ekzekuto_admin);

                if($gjej_admin == 0){
                    echo "<script>alert('Username ose Fjalekalimi eshte i pasakte, ju lutemi provoni perseri!')</script>";
                    echo"<script>window.open('admin_login.php','_self') </script>"; 
                }
                else{
                    $_SESSION['admin'] = $perdorues;
                    
                    echo "<script> alert('Ju u kycet me sukses, Faleminderit!')</script>";
                    echo"<script>window.open('admin.php?shiko_eventet','_self') </script>";    
                }
                    
            }
        ?>