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
        <form action="wynik.php" method="POST" class="styled-form">
            <div class="form-row">
                <label for="imie">Imię:</label>
                <input type="text" name="imie" required>
            </div>

            <div class="form-row">
                <label for="nazwisko">Nazwisko:</label>
                <input type="text" name="nazwisko" required>
            </div>

            <div class="form-row">
                <label for="wiek">Wiek:</label>
                <input type="number" name="wiek" required>
            </div>

            <div class="form-row">
                <label for="mail">Mail:</label>
                <input type="email" name="mail" required>
            </div>

            <div class="form-row">
                <label>Czy byłeś już na naszej strzelnicy?</label>
                <div class="radio-options">
                    <input type="radio" id="tak" name="byles" value="Tak">
                    <label for="tak">TAK</label>
                    <input type="radio" id="nie" name="byles" value="Nie">
                    <label for="nie">NIE</label>
                </div>
            </div>

            <div class="form-row">
                <input type="checkbox" name="newsletter" value="Tak">
                <label>Zapis do newslettera</label>
            </div>

            <div class="form-row">
                <input class="submit" type="submit" value="Prześlij">
            </div>
        </form>
    </section>
</body>
</html>