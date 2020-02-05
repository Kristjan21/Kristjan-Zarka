
<!DOCTYPE html>
<html lang="en">
<head>
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
    .kthehu{
      text-align: center;

    }
    
  </style>
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
<body>
<h4>Eventet tuaja</h4>

    <div>
        <form action="" method="post" enctype="multipart/form-data">


        <?php

echo "<table border='1' align='center'>
    <thead>
        <td>Id</td>
        <td>Kategori</td>
        <td>Dita</td>
        <td>Cmimi</td>
        <td>Pershkrimi</td>
        <td>Imazhi</td>
        <td>Fjalekyce</td>
        <td>Ndrysho</td>
        <td>Fshi</td>
    </thead><tbody>";
    $perdorues = $_SESSION['user'];
    $gjej_event = "select * from events where username_lokalit='$perdorues'";
    $ekzekuto_event = mysqli_query($con, $gjej_event);
        
        while($rresht_event = mysqli_fetch_array($ekzekuto_event)){
            $id=$rresht_event['event_id'];
            $kategori=$rresht_event['event_category'];
            $dita = $rresht_event['event_day'];
            $merr_kategorine = "select * from categories where category_id='$kategori'";
            $ekzekuto_kategorine = mysqli_query($con, $merr_kategorine);
            $merr_dite = "select * from days where day_id='$dita'";
            $ekzekuto_dite = mysqli_query($con, $merr_dite);

            while($rresht_kategori = mysqli_fetch_array($ekzekuto_kategorine)) {

        
            $kategori1 = $rresht_kategori['category_title'];
            }
            while($rresht_dite = mysqli_fetch_array($ekzekuto_dite)) {

        
                $dita1 = $rresht_dite['day_title'];
                }
                
            
            
            $cmimi = $rresht_event['event_price'];
            $pershkrimi = $rresht_event['event_description'];
            $imazhi = $rresht_event['event_image'];
            $fjalekyce = $rresht_event['event_keywords'];
            

            echo "<tr> 
                    <td>$id</td>               
                    <td>$kategori1</td>
                    <td>$dita1</td>
                    <td>$$cmimi</td>
                    <td>$pershkrimi</td>
                    <td>$imazhi</td>
                    <td>$fjalekyce</td>
                    <td><a href='ndryshoevent.php?editId=$id'>Ndrysho</a></td>
                    <td><a href='eventetekrijuara.php?fshiId=$id'>Fshi</a></td>
                 </tr>";       
        }

        echo "</tbody></table>";
     
        
      
   


    if(isset($_GET['fshiId'])){
        $fshi_id = $_GET['fshiId'];
        $fshi_query = "delete from events where event_id = '$fshi_id'";
        $ekzekuto_fshirjen = mysqli_query($con, $fshi_query);
        if($ekzekuto_fshirjen){
            echo '<script type="text/javascript">
              alert("U fshi me sukses !!");
              window.location.href="eventetekrijuara.php";
            </script>
        
            ';
          }
          else{
            echo '<script type="text/javascript">
              alert("Deshtoi !");
                window.location.href="eventetekrijuara.php";
            </script>';
          }
    }
    if(isset($_POST['kthe'])){
      header("location: myaccount.php?home");
    }
  
    
?>
            
            </form>
            <div class="kthehu">
               <input type="submit" name="kthe" value="Kthehu">
        </div>
        
        </div>

</body>
</html>
<?php } ?>

