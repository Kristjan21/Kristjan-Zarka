<html>
    <head><title>Krijoni profilin</title>
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
    input[type=text],input[ type=password],input[ type=number],input[ type=email]{
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
    

    </style></head>
    <link rel="stylesheet" href="styles/style.css" media="all">
    <body class="noku">
        <form action="" method="POST">
        <div class="log">
        <h2>Regjistrohu</h2>
        <form>
        <input  type="text" placeholder=" Emri" name="name" required>
        <input  type="text" placeholder=" Username" name="username" required>
        <input  type="password"  placeholder="Password" name="password" required>
        <input  type="email" placeholder=" Email" name="email" required>
        <input  type="number" placeholder=" Telefon" name="phone" required>
        
        <input class="kristi" type="submit" name="submit" value="Regjistrohu">
        

        </form>
        </div>
           
        </form>
    </body>
</html>
 <?php
 
 include("includes/database.php");

 if(isset($_POST['submit'])){
    $username=$_POST['username'];
        $query1="SELECT username FROM biznes WHERE username='$username' ";
        $query_rezultat = mysqli_query($con, $query1);
        $numero = mysqli_num_rows($query_rezultat);
        if($numero==0){
            $emri=$_POST['name'];
            $fjalekalimi=$_POST['password'];
            $email=$_POST['email'];
            $telefon=$_POST['phone'];
            $query="INSERT INTO biznes(name,username,password,email,phone) VALUES('$emri','$username','$fjalekalimi','$email','$telefon')";
            mysqli_query($con,$query);
            echo "<script> alert('Profili u krijua me sukses, Faleminderit!')</script>";
            echo"<script>window.open('login.php','_self') </script>";  
        }else{
            echo"<h1>Futni Username tjeter!</h1>";
        }
        mysqli_close($con);
}

    


 ?>