<?php

$con = mysqli_connect("localhost", "root","","ecas");

function merrKategorite(){

    global $con;

    $merr_kategori = "select * from categories";
    $ekzekuto_kategori = mysqli_query($con, $merr_kategori);

    while($rresht_kategori = mysqli_fetch_array($ekzekuto_kategori)) {

        $id_kategori = $rresht_kategori['category_id'];
        $titull_kategori = $rresht_kategori['category_title'];
        echo "<li><a href='index.php?category=$id_kategori'>$titull_kategori</a></li>";

    }

}


function merrDitet(){

    global $con;

    $merr_ditet = "select * from days";
    $ekzekuto_ditet = mysqli_query($con, $merr_ditet);

    while($rresht_ditet = mysqli_fetch_array($ekzekuto_ditet)) {

        $id_dita = $rresht_ditet['day_id'];
        $titull_dita = $rresht_ditet['day_title'];
        echo "<li><a href='index.php?day=$id_dita'>$titull_dita</a></li>";

    }

}

function merrEventet(){
    if(!isset($_GET['category'])){
        if(!isset($_GET['day'])){ 
            global $con;
            $merr_eventet = "select * from events order by RAND() LIMIT 0,12";
            $ekzekuto_merr_eventet = mysqli_query($con,$merr_eventet);
            while($rresht_event= mysqli_fetch_array($ekzekuto_merr_eventet)){
                $event_id = $rresht_event['event_id'];
                $event_kategori = $rresht_event['event_category'];
                $event_dite = $rresht_event['event_day'];
                $emri_lokalit = $rresht_event['emri_lokalit'];
                $event_cmim = $rresht_event['event_price'];
                $event_imazh = $rresht_event['event_image'];
                $event_fjalekyce = $rresht_event['event_keywords'];

                echo "
                        <div id='single_event'>
                            <h3>$emri_lokalit</h3>
                            
                            <img src='admin_area/event_images/$event_imazh' width='180' height='180'>
                            <p style='text-align:center'>Cmimi i biletes: $ $event_cmim</p><br>

                            <a href='details.php?event_id=$event_id' style='float:left'>Detaje</a>
                            

                        </div>
                
                
                ";
            }
        }
    }
}


function merrEventeKategori(){
    if(isset($_GET['category'])){
        $id_kategorise = $_GET['category'];
        global $con;
        $merr_kategori_event = "select * from events where event_category='$id_kategorise'";
        $ekzekuto_kategori_event = mysqli_query($con,$merr_kategori_event);
        $numero = mysqli_num_rows($ekzekuto_kategori_event);
        if($numero==0){
            echo "<h4>Kjo kategori nuk ka ende evente ju kerkojme ndjese!</h4>";
        }
        while($rresht_kategori_event= mysqli_fetch_array($ekzekuto_kategori_event)){
            $event_id = $rresht_kategori_event['event_id'];
            $event_kategori = $rresht_kategori_event['event_category'];
            $event_dita = $rresht_kategori_event['event_day'];
            $emri_lokalit = $rresht_kategori_event['emri_lokalit'];
            $event_cmim = $rresht_kategori_event['event_price'];
            $event_imazh = $rresht_kategori_event['event_image'];
            $event_fjalekyce = $rresht_kategori_event['event_keywords'];
            
            echo "
                    <div id='single_event'>
                        <h3>$emri_lokalit</h3>
                        
                        <img src='admin_area/event_images/$event_imazh' width='180' height='180'>
                        <p style='text-align:center'>Cmimi i biletes: $$event_cmim</p><br>

                        <a href='details.php?event_id=$event_id' style='float:left'>Detaje</a>
                        
                       

                    </div>
            
            
            ";
        }
    }
    
}


function merrEventeDite(){
    if(isset($_GET['day'])){
        $dite_id = $_GET['day'];
        global $con;
        $merr_evente_dite = "select * from events where event_day='$dite_id'";
        $ekzekuto_evente_dite = mysqli_query($con,$merr_evente_dite);
        $numero = mysqli_num_rows($ekzekuto_evente_dite);
        if($numero==0){
            echo "<h4>Kjo dite nuk ka ende evente ju kerkojme ndjese!</h4>";
        }
        while($rresht_event_dite= mysqli_fetch_array($ekzekuto_evente_dite)){
            $event_id = $rresht_event_dite['event_id'];
            $event_dite = $rresht_event_dite['event_day'];
            
            $emri_lokalit = $rresht_event_dite['emri_lokalit'];
            $event_cmim = $rresht_event_dite['event_price'];
            $event_imazh = $rresht_event_dite['event_image'];
            $event_fjalekyce = $rresht_event_dite['event_keywords'];
            
            echo "
                    <div id='single_event'>
                        <h3>$emri_lokalit</h3>
                        
                        <img src='admin_area/event_images/$event_imazh' width='180' height='180'>
                        <p style='text-align:center'>Cmimi i biletes: $$event_cmim</p><br>

                        <a href='details.php?event_id=$event_id' style='float:left'>Detaje</a>
                        
                        

                    </div>
            
            
            ";
        }
    }
}


function merrGjithEventet(){ 
    global $con;
    $merr_evente = "select * from events";
    $ekzekuto_merr_evente = mysqli_query($con,$merr_evente);
    while($rresht_event= mysqli_fetch_array($ekzekuto_merr_evente)){
        $event_id = $rresht_event['event_id'];
        $event_kategori = $rresht_event['event_category'];
        $event_dite = $rresht_event['event_day'];
        $emri_lokalit = $rresht_event['emri_lokalit'];
        $event_cmim = $rresht_event['event_price'];
        $event_imazh = $rresht_event['event_image'];
        $event_fjalekyce = $rresht_event['event_keywords'];

        echo "
                <div id='single_event'>
                    <h3>$emri_lokalit</h3>
                    
                    <img src='admin_area/event_images/$event_imazh' width='180' height='180'>
                    <p style='text-align:center'>Cmimi i biletes: $$event_cmim</p><br>

                    <a href='details.php?event_id=$event_id' style='float:left'>Detaje</a>
                    
                    

                </div>
        
        
        ";
    }
}

function merrDetajePerEvent(){
    global $con;
    

    if(isset($_GET['event_id'])){
        $event_id = $_GET['event_id'];
        $merr_eventin = "select * from events where event_id = '$event_id'";

        $ekzekuto_query = mysqli_query($con, $merr_eventin);

        while($rresht_event = mysqli_fetch_array($ekzekuto_query)){
            $event_id = $rresht_event['event_id'];
            $event_fjalekyce = $rresht_event['event_keywords'];
            $emri_lokalit = $rresht_event['emri_lokalit'];
            $event_cmim = $rresht_event['event_price'];
            $event_imazh = $rresht_event['event_image'];
            $event_emer = $rresht_event['event_name'];
            $event_pershkrim = $rresht_event['event_description'];
        

            echo "
            <div id='single_event'>
                <h3>$emri_lokalit</h3>
                
                <img src='admin_area/event_images/$event_imazh' width='400' height='400'>
                <p>Cmimi i biletes: $$event_cmim</p><br>
                <p>Emri i eventit: $event_emer </p><br>
                <p>$event_pershkrim</p><br>

                <a href='index.php' style='float:left'>Dil</a>
                <a href='book.php?add_booking=$event_emer' style='float:right'><button style='float:right'>Rezervo</button></a>
                

            </div>
    
    
            ";
        }

    }
}


function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}

?>












