<table width="795px" align="center" class="table" style="border:1px">
    <tr>
        <td colspan="6" align="center"><h2>Shiko te gjithe klientet <h2></td>
    </tr>

    <tr>
        <th>NR</th>
        <th>Emri</th>
        <th>Email</th>
        <th>Kontakti</th>
        <th>Fshije</th>
    </tr>
    <?php
        include("includes/database.php");
        $merri_klientet = "select * from biznes";
        $ekzekuto_klientet = mysqli_query($con, $merri_klientet);
        $i = 0;
        while($rresht_klient = mysqli_fetch_array($ekzekuto_klientet)){
            $id_klienti=$rresht_klient['id'];
            $emer_klienti = $rresht_klient['name'];
            $email_klienti = $rresht_klient['email'];
            $kontakt_klienti = $rresht_klient['phone'];
            $i++;
        
    ?>

    <tr align="center" style="border-top:1px solid black;">
        <td><?php echo $i?></td>
        <td><?php echo $emer_klienti?></td>
        <td><?php echo $email_klienti?></td>
        <td><?php echo $kontakt_klienti?></td>
        <td><a href="fshi_klient.php?fshi_klient=<?php echo $id_klienti; ?>">Fshi</a></td>
    </tr>

        <?php }?>
</table>