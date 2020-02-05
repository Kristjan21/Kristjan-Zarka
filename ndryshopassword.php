<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="verifikopasswords.js"></script>

</head>
<body>
<h2 align="center">Ndryshoni passwordin tuaj</h2>
<form   action="" method="post" enctype="multipart/form-data">
    <table align="center" width="1300px">
       
        <tr>
            <td align="right">Shkruani passwordin e vjeter:</td>
            <td><input type="password" name="password" size="30" required></td>
        </tr>

        <tr>
            <td align="right">Shkruani passwordin e ri:</td>
            <td><input type="password" name="password_ri" size="30"required></td>
        </tr>

        <tr>
            <td align="right">Perseriteni passwordin e ri:</td>
            <td><input type="password" name="password_ri_konfirmim" size="30" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center"><input type="submit" name="ndrysho_password" value="Ndrysho Password" size="30"></td>
        </tr>        
    </table>
</form>
</body>
</html>

<?php
    include("includes/database.php");
    if(isset($_POST['ndrysho_password'])){
        $perdorues = $_SESSION['user'];
        $password=$_POST['password'];
        $password_ri = $_POST['password_ri'];
        $password_ri_konfirmim=$_POST['password_ri_konfirmim'];
        $merr_password = "select id from biznes where username='$perdorues' and password='$password'";
        $ekzekuto_password = mysqli_query($con, $merr_password);
        $shiko_password = mysqli_num_rows($ekzekuto_password);
        if($shiko_password == 0){
            echo "<script>alert('Nuk e keni shkruar passwordin sakte!')</script>";
        }else if($password_ri != $password_ri_konfirmim){
            echo "<script>alert('Passwordet nuk po na rakordojne, ndoshta provojeni perseri')</script>";
        }
        else{
            $update_password = "update biznes set password='$password_ri' where username='$perdorues'";
            $ekzekuto_update_password = mysqli_query($con, $update_password);
            echo "<script>alert('Passwordi u riakordua me sukses')</script>";
            echo "<script>window.open('myaccount.php?home', '_self')</script>";
        }
        
    }
?>