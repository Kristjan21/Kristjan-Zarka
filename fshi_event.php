<?php

    include("includes/database.php");
    if(isset($_GET['fshi_event'])){

        $fshi_event = $_GET['fshi_event'];
        $fshi_event_kerkese = "delete from events where event_id = '$fshi_event'";

        $ekzekuto_fshi_event = mysqli_query($con, $fshi_event_kerkese);

        if($ekzekuto_fshi_event){
            echo "<script>alert('Eventi u fshi me sukses')</script>";
            echo "<script>window.open('admin.php?shiko_eventet', '_self')</script>";
        }
    }


?>