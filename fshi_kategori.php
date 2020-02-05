<?php

    include("includes/database.php");
    if(isset($_GET['fshi_kategori'])){

        $fshi_kategori = $_GET['fshi_kategori'];
        $fshi_kategori_kerkese = "delete from categories where category_id = '$fshi_kategori'";

        $ekzekuto_fshi_kategori = mysqli_query($con, $fshi_kategori_kerkese);

        if($ekzekuto_fshi_kategori){
            echo "<script>alert('Kategoria u fshi me sukses')</script>";
            echo "<script>window.open('admin.php?shiko_kategorit', '_self')</script>";
        }
    }


?>