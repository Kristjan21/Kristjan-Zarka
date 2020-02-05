<style>
body
      {
        background: url( 'images/wall.jpg') no-repeat center fixed;
      }
    table,tr{
      width: 80%;
      margin: auto;
      table-layout: fixed;
      background: white;
      opacity: 0.8;
      color: black;
      margin-top: 10px;
    }
    
    
</style>
<?php
    include("includes/database.php");
    session_start();
    
     
     $perdorues = $_SESSION['user'];
    
     $merr_event = "select * from events where username_lokalit='$perdorues'";
     $ekzekuto_merr_event = mysqli_query($con, $merr_event);
     
     if(isset($_GET['editId'])){
         $ndrysho = $_GET['editId'];
         $kerko_ndrysho = "select * from events where event_id = '$ndrysho'";
         $ekzekuto_ndrysho = mysqli_query($con, $kerko_ndrysho); 

     $rresht_ndrysho = mysqli_fetch_array($ekzekuto_ndrysho);
     $id = $rresht_ndrysho['event_id'];
     $kategori =  $rresht_ndrysho['event_category'];
     $dita =  $rresht_ndrysho['event_day'];
     $cmimi =  $rresht_ndrysho['event_price'];
     $pershkrimi =  $rresht_ndrysho['event_description'];
     $imazhi =  $rresht_ndrysho['event_image'];
     $fjalekyce =  $rresht_ndrysho['event_keywords'];
    }

?>
            <form  align="center" action="" method="post" enctype="multipart/form-data">
                <table align="center" width="1000px">
                    <tr>
                        <td align="right"><h4>Ndrysho eventin</h4></td>
                    </tr>
                    

                    <tr>
                    <td align="right" >Kategoria: </td>
                <td>
                    <select name="event_category" id="">
                    <option value="">Zgjidh kategorine</option>
                        <?php
                            $merr_kategori = "select * from categories";
                            $ekzekuto_query = mysqli_query($con, $merr_kategori);

                            while($rresht_kategori = mysqli_fetch_array($ekzekuto_query)) {
                        
                                $kategori_id = $rresht_kategori['category_id'];
                                $kategori_titull = $rresht_kategori['category_title'];
                                echo "<option value='$kategori+id'>$kategori_titull</option>";
                        
                            }
                        ?>
                    </select>
                </td>
             </tr>

                    <tr>
                    <td align="right">Dita: </td>
                <td>
                <select name="event_day" id="">
                    <option value="">Zgjidh diten</option>
                        <?php
                        
                            $merr_dite = "select * from days";
                            $ekzekuto_query = mysqli_query($con, $merr_dite);
                        
                            while($rresht_dite = mysqli_fetch_array($ekzekuto_query)) {
                        
                                $dite_id = $rresht_dite['day_id'];
                                $emer_dite = $rresht_dite['day_title'];
                                echo "<option value='$dite_id'>$emer_dite</option>";
                        
                            }
                        ?>
                    </select>
                </td>
                    </tr>

                    <tr>
                        <td align="right">Cmimi i biletes:</td>
                        <td ><input type="text" name="cmimi" value="<?php echo $cmimi ?>" ></td>
                    </tr>
                    <tr>
                        <td align="right">Fjalet kyce:</td>
                        <td><input type="text" name="fjalekyce" value="<?php echo $fjalekyce ?>" ></td>
                    </tr>
                    <tr>
                <td align="right">Pershkrimi(I fruari,Menu,Ora,Hyrja,Nr. cel): </td>
                <td height="300"><textarea name="pershkrimi" rows="20" cols="60" id="mytextarea" value="<?php echo $pershkrimi ?>" ></textarea></td>
            </tr>
                    
                    <tr>
                        <td align="right">Fotografia e eventit:</td>
                        <td><input type="file" name="image"> <img src="images/<?php echo $imazhi; ?>" alt="" width="50" height="50"></td>
                    </tr>
                    
                    <tr>
                        <td colspan="2" align="center"><input type="submit" name="update" value="Ndrysho event"></td>
                    </tr>

                </table>

            </form>
        

<?php
        if(isset($_POST['update'])){
            
            $id = $id;
            $dita=$_POST['event_day'];
            $kategori = $_POST['event_category'];
            
            $cmimi = $_POST['cmimi'];
            $imazh = $_FILES['image']['name'];
            $imazh_tmp = $_FILES['image']['tmp_name'];
           
            $fjalekyce = $_POST['fjalekyce'];
            $pershkrimi = $_POST['pershkrimi'];  
             
            move_uploaded_file($imazh_tmp,"images/$imazh");   
            $ndrysho_event = "update events set event_category='$kategori', event_day='$dita', event_price='$cmimi',
            event_image='$imazh', event_keywords='$fjalekyce', event_description='$pershkrimi' where event_id='$id'";

            $ekzekuto_query = mysqli_query($con,$ndrysho_event);

            if($ekzekuto_query){
                echo "<script>alert('Eventi u ndryshua me sukses') </script>";
                echo "<script>window.open('myaccount.php?home','_self')</script>";
            }
            
        }
    
?>

