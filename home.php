<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
   table input[type="submit"] {
    
    height: 40px;
    background: white;
    color: black;
    border: 1px white;
    font-size:18px;
    border-radius:20px;
   }
   table input[type="submit"]:hover{
       cursor:pointer;
       background:red;
       border: 1px red;
       color: white;
   }
    </style>
</head>
<body>


    <div>
        <form action="" method="post" enctype="multipart/form-data">


                <table align="center" width="1300px">
                    
                    
                    <tr>
                        <td colspan="5" align="center"><input type="submit" name="eventetekrijuara" value="Eventet e krijuara"></td>
                        <?php if (isset($_POST['eventetekrijuara'])){
                            echo"<script>window.open('eventetekrijuara.php','_self')</script>";
                        }
                        ?>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" name="krijoevent" value="Krijo event"></td>
                        <?php if (isset($_POST['krijoevent'])){
                            echo"<script>window.open('insert_event.php','_self')</script>";
                        }
                        ?>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" name="rezervime" value="Rezervime"></td>
                        <?php if (isset($_POST['rezervime'])){
                            echo"<script>window.open('rezervime.php','_self')</script>";
                        }
                        ?>
                    </tr>

                </table>

            </form>
        </div>

</body>
</html>

<?php
?>