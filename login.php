<html>
<?php
session_start();
    include("includes/database.php");
    
    include("functions/functions.php");

?>
    <head><title></title></head>
    <link rel="stylesheet" href="styles/style.css" media="all">
    <body class="noku">
        <form action="" method="POST">
            <center>
                <table border="1" width="400" height="300">
                    <tr>
                        <td colspan="5" align="center">Plotesoni fushat e meposhtme per t'u regjistruar:</td>
                    </tr>
                    <tr><td align="right">Username:</td><td><input type="text" id="user" name="user"></td></tr>
                    <tr><td align="right">Password:</td><td><input type="password" id="pass" name="pass"></td></tr>
                    <tr>
                        <td colspan="5" align="center"><input type="submit" name="login" value="Hyni"></td>
                    </tr>
                    <tr>
                        <td colspan="5" align="center"><input type="submit" name="createaccount" value="Krijo profil"></td>
                        <?php if (isset($_POST['createaccount'])){
                            echo"<script>window.open('createaccount.php','_self')</script>";
                        }
                        ?>
                    </tr>
                    <tr>
                        <td colspan="5" align="center"><input type="submit" name="admin" value="Hyni si admin"></td>
                        <?php if (isset($_POST['admin'])){
                            echo"<script>window.open('admin_login.php','_self')</script>";
                        }
                        ?>
                    </tr>
                </table>
            </center>  
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
        
