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
                        <td colspan="5" align="center">Jeni duke hyre si Admin</td>
                    </tr>
                    <tr><td align="right">Admin username:</td><td><input type="text" id="admin" name="admin"></td></tr>
                    <tr><td align="right">Admin password:</td><td><input type="password" id="pas" name="pas"></td></tr>
                    <tr>
                        <td colspan="5" align="center"><input type="submit" name="login" value="Hyni"></td>
                    </tr>
                    </tr>
                </table>
            </center>  
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