<form action="" method="post" style="padding: 100px;">
    <b style="padding: 20px;margin:30px">Shtoje nje kategori te re</b><br>
    <input type="text" name="kategori_re" style="margin:30px">
    <input type="submit" name="shtoje_kategorine" value="Shtoje kategorine">
</form>

<?php
    include("includes/database.php");
    if(isset($_POST['shtoje_kategorine'])){
        $kategori = $_POST['kategori_re'];
        $kontrollo_kategori = "Select * from categories where category_title = '$kategori'";
        $ekzekuto_kontrollo = mysqli_query($con, $kontrollo_kategori);

        if(mysqli_num_rows($ekzekuto_kontrollo)==0){
            $shto_query = "insert into categories(category_title) values ('$kategori')";
            $ekzekuto_shtim = mysqli_query($con,$shto_query);

            if($ekzekuto_shtim){
                echo "<script>alert('Kategoria u shtua me sukses')</script>";
                echo "<script>window.open('admin.php?shiko_kategorit','_self')</script>";
            }
        }else{
            echo "<script>alert(' Kategoria ekziston!')</script>";
                echo "<script>window.open('admin.php?shto_kategori','_self')</script>";
        }

    }

?>