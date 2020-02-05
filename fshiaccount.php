<h3 style="text-align:cnter">Fshije profilin tend</h3>

<form action="" method="post">
    <table  width="1300px">
        <tr>
        <td align="center">Shkruaje passwordin per te fshire llogarine: </td>
            
        </tr>
        <td align="center"><input type="password" name="password"></td>
        <tr>
            <td colspan="2" align="center"><input type="submit" name="delete" value="Fshije profilin"></td>
        </tr>
    </table>
</form>

<?php
    include("includes/database.php");
    if(isset($_POST['delete'])){
        $perdorues = $_SESSION['user'];
        $password = $_POST['password'];

        $gjej_biznes = "select * from biznes where username='$perdorues' and password='$password'";
        $ekzekuto_gjej_biznes = mysqli_query($con, $gjej_biznes);

        $rresht_biznes_gjetur = mysqli_num_rows($ekzekuto_gjej_biznes);

        if($rresht_biznes_gjetur == 0){
            echo "<script>alert('Nuk e keni shkruar mire passwordin, mendojeni edhe nje here fshirjen, mos u nxitoni!')</script>";
        }else{
            $fshi_biznes = "delete from biznes where username='$perdorues'";
            $ekzekuto_fshi_biznes = mysqli_query($con, $fshi_biznes);
            echo "<script>window.open('index.php','_self')</script>";
            session_destroy();
        }
    }
?>