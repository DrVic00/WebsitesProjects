<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="STYLE.css">
    <title>Oferta</title>
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
    <section class="zdjecia">
        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'strzelnica');
            $query = "SELECT NazwaPliku, id_zdjecia FROM zdjecia;";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($result)){
                echo "<img class='image' src=".$row[0]." alt=".$row[1].">";
            }
        ?>
    </section>
    <section>
        <?php
        $query2 = "SELECT opis FROM opisy;";
        $result2 = mysqli_query($conn, $query2);
        while($row = mysqli_fetch_array($result2)){
            echo "<p class='description'>$row[0]</p>";
        }
        ?>
    </section>
    <section>
        <div>
            <p></p>
        </div>
        <div>

        </div>
    </section>

    <script>
        const images = document.querySelectorAll('.image');
        const descriptions = document.querySelectorAll('.description');

        images.forEach((image, index) => {
            image.addEventListener('click', () => {
                descriptions.forEach(description => {
                    description.classList.add('hidden');
                });
                descriptions[index].classList.remove('hidden');
            });
        });

        window.onload = function() {
        const sixthImage = document.querySelectorAll('.image')[5];
        sixthImage.click();
        }
    </script>

</body>
</html>