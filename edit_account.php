<?php
    include("includes/database.php");
     $perdorues = $_SESSION['user'];
    
     $merr_perdorues = "select * from biznes where username='$perdorues'";
     $ekzekuto_perdorues = mysqli_query($con, $merr_perdorues);
     

     $rresht_perdorues = mysqli_fetch_array($ekzekuto_perdorues);

     $id = $rresht_perdorues['id'];
     $emer =  $rresht_perdorues['name'];
     $email =  $rresht_perdorues['email'];
     $passsword =  $rresht_perdorues['password'];
     $username =  $rresht_perdorues['username'];
     $kontakt =  $rresht_perdorues['phone'];
     $imazh =  $rresht_perdorues['image'];

?>
            <form action="" method="post" enctype="multipart/form-data">
                <table align="center" width="1300px">
                    <tr>
                        <td align="right" ><h2>Rirregullo llogarine</h2></td>
                    </tr>
                    

                    <tr>
                        <td align="right">Emri :</td>
                        <td><input type="text" name="name" value="<?php echo $emer ?>" ></td>
                    </tr>

                    <tr>
                        <td align="right">Email :</td>
                        <td><input type="email" name="email" value="<?php echo $email ?>" ></td>
                    </tr>

                    <tr>
                        <td align="right">Password :</td>
                        <td><input type="password" name="password"  required></td>
                    </tr>

            

                    <tr>
                        <td align="right">Username:</td>
                        <td><input type="text" name="username" required ></td>
                    </tr>
                    <tr>
                        <td align="right">Kontakt:</td>
                        <td><input type="text" name="phone" value="<?php echo $kontakt ?>" ></td>
                    </tr>
                    
                    <tr>
                        <td align="right">Fotografia e profilit:</td>
                        <td><input type="file" name="image"> <img src="images/<?php echo $imazh; ?>" alt="" width="50" height="50"></td>
                    </tr>
                    
                    <tr>
                        <td colspan="2" align="center"><input type="submit" name="update" value="Ndrysho profilin"></td>
                    </tr>

                </table>

            </form>
        

<?php
        if(isset($_POST['update'])){
            

            $id = $id;
            $emer = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $imazh = $_FILES['image']['name'];
            $imazh_tmp = $_FILES['image']['tmp_name'];
            $username = $_POST['username'];
            
            $kontakt = $_POST['phone'];  
             
            move_uploaded_file($imazh_tmp,"images/$imazh");   
            $update_perdorues = "update biznes set name='$emer', email='$email', password='$password',
            image='$imazh', phone='$kontakt', username='$username' where id='$id'";

            $ekzekuto_update = mysqli_query($con,$update_perdorues);

            if($ekzekuto_update){
                echo "<script>alert('Llogaria juaj u rinovua me sukses') </script>";
                echo "<script>window.open('myaccount.php?home','_self')</script>";
            }
            
        }
?>