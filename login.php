<html>
<?php
session_start();
    include("includes/database.php");
    
    include("functions/functions.php");

?>
    <head><title>Login</title>
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
    

    </style>
    </head>
    <link rel="stylesheet" href="styles/style.css" media="all">
    <body class="noku">
        <form action="" method="POST" >
        <div class="log">
        <h2>Login</h2>
        <form>
        <input  type="text" id="user" placeholder=" Username" name="user" required>
        <input  type="password" id="pass" placeholder=" Password" name="pass" required>
        <input class="kristi" type="submit" name="login" value="Hyni">
        <a style="position:relative;left:35%" href="createaccount.php">Regjistrohu</a><br>
        <a  style="position:relative;left:32%" href="admin_login.php">Hyni si Admin</a>

        </form>
        </div>
            
        </form>
    </body></html>
    <?php 

            if(isset($_POST['login'])){
                $perdorues = $_POST['user'];
                $fjalekalim = $_POST['pass'];
                
                $gjej_perdorues = "select * from biznes where password='$fjalekalim' AND username='$perdorues'";

                $ekzekuto_gjej_perdorues = mysqli_query($con, $gjej_perdorues);

                $numero = mysqli_num_rows($ekzekuto_gjej_perdorues);

                if($numero == 0){
                    echo "<script>alert('Username ose Fjalekalimi eshte i pasakte, ju lutemi provoni perseri!')</script>";
                    exit();
                }
                if($numero>0){
                    $_SESSION['user'] = $perdorues;
                    
                    echo "<script> alert('Ju u kycet me sukses, Faleminderit!' + $perdorues)</script>";
                    echo"<script>window.open('myaccount.php?home','_self') </script>";    
                }
                    
            }
        ?>
        
