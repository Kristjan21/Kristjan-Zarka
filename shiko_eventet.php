<table width="795px" align="center" class="table" >
    <tr>
        <td colspan="6" align="center"><h2>Shiko te gjitha eventet<h2></td>
    </tr>

    <tr>
        <th>NR</th>
        <th>Titulli</th>
        <th>Foto</th>
        <th>Cmimi i biletes</th>
        <th>Pershkrimi</th>
        <th>Fshije</th>
    </tr>
    <?php
        include("includes/database.php");
        $merri_eventet = "select * from events";
        $ekzekuto_eventet = mysqli_query($con, $merri_eventet);
        $i = 0;
        while($rresht_event = mysqli_fetch_array($ekzekuto_eventet)){
            $id_eventi=$rresht_event['event_id'];
            $titull_eventi = $rresht_event['emri_lokalit'];
            $foto_eventi = $rresht_event['event_image'];
            $cmim_eventi = $rresht_event['event_price'];
            $pershkrim_eventi = $rresht_event['event_description'];
            $i++;
        
    ?>

    <tr align="center" >
        <td><?php echo $i?></td>
        <td><?php echo $titull_eventi?></td>
        <td><img src="admin_area/event_images/<?php echo $foto_eventi;?>" width="50" height="50"></td>
        <td><?php echo $cmim_eventi;?>$</td>
        <td><?php echo $pershkrim_eventi?></td>
        <td><a href="fshi_event.php?fshi_event=<?php echo $id_eventi; ?>">Fshi</a></td>
    </tr>

        <?php }?>
</table>
