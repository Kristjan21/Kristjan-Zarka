<?php

    include("includes/database.php");
    if(isset($_GET['fshi_klient'])){

        $fshi_klient = $_GET['fshi_klient'];
        $fshi_klient_kerkese = "delete from biznes where id = '$fshi_klient'";

        $ekzekuto_fshi_klient = mysqli_query($con, $fshi_klient_kerkese);

        if($ekzekuto_fshi_klient){
            echo "<script>alert('Klienti u fshi me sukses')</script>";
            echo "<script>window.open('admin.php?shiko_klientet', '_self')</script>";
        }
    }


?>