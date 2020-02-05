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
<?php 
$perdorues = $_SESSION['user'];
$event_emri = $_SESSION['event_name'];
$event_kategori = $_SESSION['event_category'];
$event_dite = $_SESSION['event_day'];
$event_cmim = $_SESSION['event_price'];
$event_pershkrim = $_SESSION['event_description'];
$event_fjalekyce = $_SESSION['event_keywords'];
$event_imazh = $_SESSION['event_image'];
$emri_lokalit = $_SESSION['name'];
$merr_kategorine = "select * from categories where category_id='$event_kategori'";
            $ekzekuto_kategorine = mysqli_query($con, $merr_kategorine);
            $merr_dite = "select * from days where day_id='$event_dite'";
            $ekzekuto_dite = mysqli_query($con, $merr_dite);

            while($rresht_kategori = mysqli_fetch_array($ekzekuto_kategorine)) {

        
            $kategori1 = $rresht_kategori['category_title'];
            }
            while($rresht_dite = mysqli_fetch_array($ekzekuto_dite)) {

        
                $dita1 = $rresht_dite['day_title'];
                }
?>
<body >
    <form  method="post" enctype="multipart/form-data">
        <table align="center" width="1000px" >
            <tr>
                <td colspan="2" align="center"><h2>Konfirmoni eventin e krijuar</h2></td>
            </tr>

            <tr>
                <td align="right">Kategoria :</td>
                        <td><input  name="event_category" value="<?php echo $kategori1 ?>" >
                </td>
            </tr>
            <tr>
                <td align="right">Dita :</td>
                        <td><input  name="event_day" value="<?php echo $dita1 ?>" >
                </td>
            </tr>

            <tr>
                <td align="right">Emri i eventit: </td>
                <td><input type="text" name="event_name" value="<?php echo $event_emri ?>"></td>
            </tr>

            <tr>
                <td align="right">Cmimi i biletes: </td>
                <td colspan="3"><input type="text" name="event_price" value="<?php echo $event_cmim ?>"></td>
            </tr>

            <tr>
                <td align="right">Pershkrimi(I fruari,Menu,Ora,Hyrja,Nr. cel): </td>
                <td height="300"><textarea name="event_description" rows="20" cols="40"  ><?php echo $event_pershkrim ?></textarea></td>
            </tr>

            <tr>
                <td align="right">Imazhi: </td>
                <td><input type="text" name="event_image" value="<?php echo $event_imazh ?>"></td>
            </tr>
            <tr>
                <td align="right">Fjalekyce: </td>
                <td colspan="3"><input type="text" name="event_keywords" value="<?php echo $event_fjalekyce ?>"></td>
            </tr>

            <tr>
                <td  colspan="2" align="center"><input type="submit" name="insert_post" value="Konfirmo"></td>
                <?php if (isset($_POST['insert_post'])){
                        echo "<script> alert('Eventi u krijua me sukses, Faleminderit!')</script>";
                            echo"<script>window.open('myaccount.php?home','_self')</script>";
                        }
                        ?>
            </tr>



        </table>
    </form>
</body>
</html>

<?php
    if(isset($_POST['insert_post'])){
         $fut_event_query= "insert into events (event_category, event_day, emri_lokalit, event_name, event_price,event_description, event_image, event_keywords,username_lokalit)
         values('$event_kategori','$event_dite','$emri_lokalit','$event_emri','$event_cmim','$event_pershkrim','$event_imazh',' $event_fjalekyce','$perdorues')";

         $fut_event = mysqli_query($con, $fut_event_query);

         
    }
?>
    <?php } ?>