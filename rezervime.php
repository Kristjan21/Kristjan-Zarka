<!DOCTYPE html>
<html lang="en">
<head>
<?php
    session_start();
    include("includes/database.php");
    if(!isset($_SESSION['user'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{
    
    
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<style>
 body
      {
        background: url( 'images/wall.jpg') no-repeat center fixed;
      }
    table,th, td{
      width: 80%;
      margin: auto;
      
      border-collapse: collapse;
      text-align:center;
      
      table-layout: fixed;
      background: white;
      opacity: 0.8;
      color: black;
      margin-top: 10px;
    }
    h4{
      left:50%;
      text-align: center;
      font-family: serif;
      font-size: 50px;
      

    }
    .kthe{
        text-align: center;
    }
</style>
<body>
<h4 >Rezervimet</h4>

    <div>
        <form action="" method="post" enctype="multipart/form-data">


        <?php

echo "<table border='1' align='center'>
    <thead>
        <td>Emri i eventit</td>
        <td>Emri</td>
        <td>Numri i personave</td>
        <td>Telefon</td>
        <td>Fshi</td>

    </thead><tbody>";
    $perdorues = $_SESSION['user'];
    
     $merr_biznes = "select * from biznes where username='$perdorues'";
     $ekzekuto_query = mysqli_query($con, $merr_biznes);
     $rresht_biznes = mysqli_fetch_array($ekzekuto_query);
     $emri=$rresht_biznes['name'];
     $merr_emri="select * from events where emri_lokalit='$emri'";
     $ekzekuto_emri = mysqli_query($con, $merr_emri);
     $titulli = array();
     while($rresht_emri = mysqli_fetch_array($ekzekuto_emri)){
         array_push($titulli, $rresht_emri['event_name']);
     }
     
    
     $merr_rezervim="select * from booking where ";
     foreach($titulli as $val){
            $merr_rezervim .= "emri_eventit='$val' OR ";  
     }

     $merr_rezervim_real = substr($merr_rezervim, 0, -3);

     $ekzekuto_rezervim = mysqli_query($con, $merr_rezervim_real);
     while($rezervuar = mysqli_fetch_array($ekzekuto_rezervim)){

            $emri_eventit=$rezervuar['emri_eventit'];
            $emri=$rezervuar['name1'];
            $nrpersons=$rezervuar['nrpersons'];
            $tel = $rezervuar['phone'];
            $id_rezervim = $rezervuar['id'];
            echo "<tr> 
                     <td>$emri_eventit</td>
                    <td>$emri</td>               
                    <td>$nrpersons</td>
                    <td>$tel</td>
                    <td><a href='fshi_rezervim.php?fshi_rezervim=$id_rezervim'>Fshi</a></td>
                 </tr>";       
        }

        echo "</tbody></table>";
        if(isset($_POST['kthehu'])){
            header("location: myaccount.php?home");
          }
          ?>
          
   
          <div class="kthe">
          <input type="submit" name="kthehu" value="Kthehu">
        </div>
       </form>
   </div>

</body>
</html>
        <?php } ?>