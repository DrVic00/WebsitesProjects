<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleAc.css">
    <title>Login</title>
</head>
<body>
    <div>

        <form action="dane.php" method="post">
            <h1>TWOJE DANE OSOBISTE</h1>
            <hr>
            <table>
                <tr><td><label for="imie-d">Imię</td> 
                    <td><input type="text" name="imie-d" id="imie-d"></td>
                </label></tr>

                <tr><td><label for="nazwisko-d">Nazwisko</td> 
                    <td><input type="text" name="nazwisko-d" id="nazwisko-d"></td>
                </label></tr>

                <tr><td><label for="mail">E-mail</td>
                    <td><input type="text" name="mail" id="mail" placeholder="adres@e-mail.pl"></td>
                </label></tr>

                <tr><td><label for="haslo">Hasło</td>
                    <td><input type="password" name="haslo" id="haslo">(min. 5 znaków)</td>
                </label></tr>
            </table>
            <label for="news">
                    <input type="checkbox" name="news" id="news">Zapisz się do naszego newslettera<br>
            </label>

            <button type="submit" ><b>Sign Up ></b></button>

            <a class="back" href="index.php"><b>Go Back <--</b></a>

        </from>

    </div>
    <script src="js.js"></script>
</body>
</html>