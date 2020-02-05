<html>
    <head><title>Rezervo</title></head>
    <link rel="stylesheet" href="styles/style.css" media="all">
    <body class="noku">
        <form action="" method="POST">
            <center>
                <table border="1" width="400" height="300">
                    <tr>
                        <td colspan="5" align="center" >Plotesoni formularin per rezervim</td>
                    </tr>
                    
                    <tr><td align="right">Emri juaj:</td><td><input type="text" name="name" required></td></tr>
                    <tr><td align="right">Numri i personave:</td><td><input type="number" name="number" required></td></tr>
                    <tr><td align="right">Numri i telefonit:</td><td><input type="number" name="phone" required></td></tr>
                    <tr>
                        <td colspan="5" align="center"><input type="submit" name="submit" value="Rezervo"></td>
                        
                    </tr>
                </table>
            </center>  
        </form>
    </body>
</html>
 <?php
include("includes/database.php");

 if(isset($_POST['submit'])){
         if(isset($_GET['add_booking'])){
            $emri_eventit = $_GET['add_booking'];
            $emri=$_POST['name'];
            $nrpersonave=$_POST['number'];
            $telefon=$_POST['phone'];
            
        
            $query="INSERT INTO booking(name1,nrpersons,phone,emri_eventit) VALUES('$emri','$nrpersonave','$telefon','$emri_eventit')";
            mysqli_query($con,$query);
            echo "<script> alert('Rezervimi u krijua me sukses, Faleminderit!')</script>";
            echo"<script>window.open('index.php','_self')</script>";
            
            
        
        mysqli_close($con);
     }
}

    


 ?>