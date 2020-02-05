window.addEventListener('load', start);

function start(){
}
<?php
    session_start();

    if(!isset($_SESSION['admin'])){
        echo "<script>window.open('admin_login.php','_self')</script>";
    }else{
        
?>