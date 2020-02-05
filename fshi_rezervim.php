<?php

    include("includes/database.php");
    if(isset($_GET['fshi_rezervim'])){

        $fshi_rezervim = $_GET['fshi_rezervim'];
        $fshi_rezervim_kerkese = "delete from booking where id = '$fshi_rezervim'";

        $ekzekuto_fshi_rezervim = mysqli_query($con, $fshi_rezervim_kerkese);

        if($ekzekuto_fshi_rezervim){
            echo "<script>alert('Rezervimi u fshi me sukses')</script>";
            echo "<script>window.open('rezervime.php', '_self')</script>";
        }
    }


?>