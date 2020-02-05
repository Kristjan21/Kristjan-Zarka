<!DOCTYPE html>
<html>
<?php
    session_start();
    include("includes/database.php");
    if(!isset($_SESSION['user'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src='https://cdn.tiny.cloud/1/g447jb1j5haeghb1xa76cxn2tcm6vo134dxu1o6fxa734uml/tinymce/5/tinymce.min.js' referrerpolicy="origin">
  </script>
  <script>
    tinymce.init({
      selector: '#mytextarea',
      force_br_newlines : false,
      force_p_newlines : false,
      forced_root_block : '',
    });
  </script>
    <title>Tirana Nightlife</title>
</head>
<style>
body
      {
        background: url( 'images/wall.jpg') no-repeat center fixed;
      }
    table,th, td{
      width: 80%;
      margin: auto;
      
      
      
      table-layout: fixed;
      background: white;
      opacity: 0.8;
      color: black;
      margin-top: 10px;
    }
    
</style>
<body >
    <form action="insert_event.php" method="post" enctype="multipart/form-data">
        <table align="center" width="1000px" >
            <tr>
                <td colspan="2" align="center"><h2>Fusni Eventin</h2></td>
            </tr>

            <tr>
                <td align="right" >Kategoria: </td>
                <td>
                    <select name="event_category" id="" required>
                    <option value="">Zgjidh kategorine</option>
                        <?php
                            $merr_kategori = "select * from categories";
                            $ekzekuto_merr_kategori = mysqli_query($con, $merr_kategori);

                            while($rresht_kategori= mysqli_fetch_array($ekzekuto_merr_kategori)) {
                        
                                $kategori_id = $rresht_kategori['category_id'];
                                $kategori_title = $rresht_kategori['category_title'];
                                echo "<option value='$kategori_id'>$kategori_title</option>";
                        
                            }
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td align="right">Dita: </td>
                <td>
                <select name="event_day" id="" required>
                    <option value="">Zgjidh diten</option>
                        <?php
                        
                            $merr_dite = "select * from days";
                            $ekzekuto_merr_dite = mysqli_query($con, $merr_dite);
                        
                            while($rresht_dite = mysqli_fetch_array($ekzekuto_merr_dite)) {
                        
                                $dite_id = $rresht_dite['day_id'];
                                $emer_dite = $rresht_dite['day_title'];
                                echo "<option value='$dite_id'>$emer_dite</option>";
                        
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right">Emri i eventit: </td>
                <td><input type="text" name="event_name" required></td>
            </tr>

            <tr>
                <td align="right">Cmimi i biletes: </td>
                <td colspan="3"><input type="text" name="event_price" required></td>
            </tr>

            <tr>
                <td align="right">Pershkrimi(I fruari,Menu,Ora,Hyrja,Nr. cel): </td>
                <td height="300"><textarea name="event_description" rows="20" cols="20" id="mytextarea" ></textarea></td>
            </tr>

            <tr>
                <td align="right">Imazhi: </td>
                <td><input type="file" name="event_image" required></td>
            </tr>
            <tr>
                <td align="right">Fjalekyce: </td>
                <td colspan="3"><input type="text" name="event_keywords"></td>
            </tr>

            <tr>
                <td  colspan="2" align="center"><input type="submit" name="insert_post" value="Fut Eventin"></td>
                <?php if (isset($_POST['insert_post'])){
                       
                            echo"<script>window.open('konfirmo.php','_self')</script>";
                        }
                        ?>
            </tr>



        </table>
    </form>
</body>
</html>

<?php
    if(isset($_POST['insert_post'])){
        $perdorues = $_SESSION['user'];

        $merr_biznes = "select * from biznes where username='$perdorues'";
        $ekzekuto_query = mysqli_query($con, $merr_biznes);
        $rresht_biznes = mysqli_fetch_array($ekzekuto_query);
        
        

         $emri_lokalit = $rresht_biznes['name'];
         $event_emri = $_POST['event_name'];
         $event_kategori = $_POST['event_category'];
         $event_dite = $_POST['event_day'];
         $event_cmim = $_POST['event_price'];
         $event_pershkrim = $_POST['event_description'];
         $event_fjalekyce = $_POST['event_keywords'];
         $event_imazh = $_FILES['event_image']['name'];
         $event_imazh_tmp = $_FILES['event_image']['tmp_name'];
         move_uploaded_file($event_imazh_tmp, "admin_area/event_images/$event_imazh");
         

         $_SESSION['name'] = $emri_lokalit;
         $_SESSION['event_name'] = $event_emri;
         $_SESSION['event_category'] = $event_kategori;
         $_SESSION['event_day'] = $event_dite;
         $_SESSION['event_price'] = $event_cmim;
         $_SESSION['event_description'] = $event_pershkrim;
         $_SESSION['event_keywords'] = $event_fjalekyce;
         $_SESSION['event_image'] = $event_imazh;


         
    }
?>
    <?php } ?>