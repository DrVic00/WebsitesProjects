<?php

    $conn = mysqli_connect("localhost", "root", "", "characters");
    $query1 = "SELECT * FROM characters";
    $result = mysqli_query($conn, $query1);


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleRDR2.css">
    <title>RDR2 Wiki</title>
</head>
<body>
    <div class="navbar">
        <h1><a href="account.php">Red Dead Redemption Account</a></h1>
        <h1><a href="memories.php">Memories</a></h1>
        <form method="POST">
            <input type="text" placeholder="Czego szukasz?" name="search" class="search">
            <button value="Szukaj" name="search-btn" class=btn>Szukaj</button>
        </form>
    </div>
    <div class="search-space">
        Wyniki przeszukania bazy danych:
        <br></br>
    <?php
        
        if(isset($_POST['search-btn'])){
            $search=$_POST['search'];

            $query2 = "SELECT * FROM characters WHERE imie='$search' or nazwisko='$search' or wiek='$search' or plec='$search'";
            $result2 = mysqli_query($conn,$query2);
            if($result2){
                    while($row = mysqli_fetch_assoc($result2)){
                        ?>
                        <table>
                        <tr>
                        <td>Imie: <?php echo $row['imie'];?> </td>
                        <td>Nazwisko: <?php echo $row['nazwisko'];?> </td>
                        <td>Wiek:  <?php echo $row['wiek'];?></td>
                        <td>Plec: <?php echo $row['plec'];?> </td>
                        <tr>
                        </table> <?php ;
                    }
                
            }

        }
        
    ?>

    </div>

    <div class="Arthur">

    </div>

    <div class="middle">
    </div>

    <div class="main">
        <?php
    
            while($row = mysqli_fetch_assoc($result)){

        ?>
        <div class="profile">
            <div class="image">
                <form method="get">
                <img src="img/<?= $row['image'] ?>">
            </div>
            <div class="description">
                <p class="name"><?php echo $row["imie"] ?></p>
                <p class="surname"><?php echo $row["nazwisko"] ?></p>
                <p class="age"><?php echo $row["wiek"] ?></p>
                <p class="plec"><?php echo $row["plec"] ?></p>
                <p class="rola"><?php echo $row["rola"] ?></p>
                <p class="wystepowanie"><?php echo $row["wystepowanie"] ?></p>
                <p class="opis"><?php echo $row["opis"] ?></p>
            </div> 
            <button type="button" onclick="openPopup()">Show More</button>
            </form>
        </div>
        <?php
        
            }

        ?>

    </div>
    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <p>Jeszcze Ci mało informacji?! Ciekawość to pierwszy stopień do piekła, a to nie diablo;] Zagraj w RDR2 to będziesz wszystko wiedzieć.</p>
        </div>
    </div>
    <script src="js.js"></script>
</body>
</html>