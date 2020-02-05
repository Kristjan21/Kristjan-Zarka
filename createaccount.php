<html>
    <head><title>Krijoni profilin</title></head>
    <link rel="stylesheet" href="styles/style.css" media="all">
    <body class="noku">
        <form action="" method="POST">
            <center>
                <table border="1" width="400" height="300">
                    <tr>
                        <td colspan="5" align="center" >Krijoni profilin tuaj:</td>
                    </tr>
                    <tr><td align="right">Emri:</td><td><input type="text" name="name" required></td></tr>
                    <tr><td align="right">Username:</td><td><input type="text" name="username" required></td></tr>
                    <tr><td align="right">Password:</td><td><input type="password" name="password" required></td></tr>
                    <tr><td align="right">Email:</td><td><input type="email" name="email" required></td></tr>
                    <tr><td align="right">Telefon:</td><td><input type="number" name="phone" required></td></tr>
                    
                    <tr>
                        <td colspan="5" align="center"><input type="submit" name="submit" value="Regjistrohu"></td>
                    </tr>
                </table>
            </center>  
        </form>
    </body>
</html>
 <?php
 
 $con=mysqli_connect("localhost","root","")or die("not connected");
 
 $a=mysqli_select_db($con,"ecas")or die("no db found");

 if(isset($_POST['submit'])){
    $username=$_POST['username'];
        $query1="SELECT username FROM biznes WHERE username='$username' ";
        $query_rezultat = mysqli_query($con, $query1);
        $numero = mysqli_num_rows($query_rezultat);
        if($numero==0){
            $emri=$_POST['name'];
            $fjalekalimi=$_POST['password'];
            $email=$_POST['email'];
            $telefon=$_POST['phone'];
            $query="INSERT INTO biznes(name,username,password,email,phone) VALUES('$emri','$username','$fjalekalimi','$email','$telefon')";
            mysqli_query($con,$query);
            echo "<script> alert('Profili u krijua me sukses, Faleminderit!')</script>";
            echo"<script>window.open('login.php','_self') </script>";  
        }else{
            echo"<h1>Futni Username tjeter!</h1>";
        }
        mysqli_close($con);
}

    


 ?>