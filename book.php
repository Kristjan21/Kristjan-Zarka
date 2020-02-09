<html>
    <head><title>Rezervo</title>
    <style>
    .log{
        margin:auto;
        width:250px;
        box-shadow:0px 8px 16px 0px rgba(0,0,0,0.9);
        padding: 80px 40px;
        margin-top:50px;
        background: linear-gradient(top, #3c3c3c 0%, #222222 100%);
        background: -webkit-linear-gradient(top,#3c3c3c 0%,#222222 100%);
    }
    h2{
        margin:0 0 30px 0;
        padding: 10px;
        color: #e92c2a;
        text-align:center;
    }
    input{
        width:100%;
        margin-bottom: 30px;
    }
    input[type=text],input[ type=number]{
        border: none;
        outline:none;
        border: 2px #fff solid;
        background: transparent;
        border-radius: 20px;
        box-sizing: border-box;
        color:#fff;
        font-size: 16px;
        padding: 10px;
        text-align: center;

    }
    .kristi{
        border: none;
        outline: none;
        padding: 10px;
        color: #fff;
        font-family: Arial;
        background:#ff267e;
        cursor: pointer;
        border-radius: 20px;
          }

    .kristi :hover{
        background: black;
        color: white;
    }
    </style>
    
    </head>
    <link rel="stylesheet" href="styles/style.css" media="all">
    <body class="noku">
        <form action="" method="POST">
        <div class="log">
        <h2>Plotesoni formularin e rezervimit</h2>
        <form>
        <input  type="text" id="name" placeholder=" Emri juaj" name="name" required>
        <input  type="number" id="number" placeholder=" Numri i personave" name="number" required>
        <input  type="number" id="phone" placeholder=" Numri i telefonit" name="phone" required>
        <input class="kristi" type="submit" name="submit" value="Rezervo">

        </form>
        </div>
            
        </form>
    </body>
</html>
 <?php
include("includes/database.php");

 if(isset($_POST['submit'])){
         if(isset($_GET['add_booking'])){
            $emri_eventit = $_GET['add_booking'];
            $emri=$_POST['name'];
            $nrpersonave=$_POST['number'];
            $telefon=$_POST['phone'];
            
        
            $query="INSERT INTO booking(name1,nrpersons,phone,emri_eventit) VALUES('$emri','$nrpersonave','$telefon','$emri_eventit')";
            mysqli_query($con,$query);
            echo "<script> alert('Rezervimi u krijua me sukses, Faleminderit!')</script>";
            echo"<script>window.open('index.php','_self')</script>";
            
            
        
        mysqli_close($con);
     }
}

    


 ?>