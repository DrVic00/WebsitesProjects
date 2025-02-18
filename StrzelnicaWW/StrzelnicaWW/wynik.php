<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="STYLE.css">
    <title>Formularz</title>
</head>
<body>
    <header>
        <a href="index.html" class="text-logo">
            <img src="revolver.png" alt="guns_logo">
            <h1>Strzelnica WW</h1>
        </a>
        <div class="links">
            <a href="oferta.php">Oferta</a>
            <a href="formularz.php">Formularz</a>
            <a href="kontakt.html">Kontakt</a>
        </div>
    </header>
    <section>
        <h1>Zapisany/a na strzelnice WW</h1>
    </section>
    <section class="wynik">
        <?php
            $imie = $_POST['imie'];
            $nazwisko = $_POST['nazwisko'];
            $wiek = $_POST['wiek'];
            $mail = $_POST['mail'];
            $byles = $_POST['byles'];
            $newsletter = isset($_POST['newsletter']) ? $_POST['newsletter'] : 'Nie';

            $conn = mysqli_connect('localhost', 'root', '', 'strzelnica');
            $query3 = "INSERT INTO goscie (imie, nazwisko, wiek, mail, byles, newsletter) VALUES ('$imie', '$nazwisko', '$wiek', '$mail', '$byles', '$newsletter')";
            $result3 = mysqli_query($conn, $query3);
            if($result3){
                echo "$imie $nazwisko dziękujemy że jesteś z nami!";
            }
        ?>
        <br>
        <a href="index.html">Powrót na stronę główną</a>
    </section>
</body>
</html>