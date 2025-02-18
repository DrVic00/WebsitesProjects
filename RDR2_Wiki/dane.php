<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleAc.css">
    <title>Document</title>
</head>
<body>
    <div class="main">
        <?php
            error_reporting(0);
            $imie_d = $_POST['imie-d'];
            $nazwisko_d = $_POST['nazwisko-d'];
            $mail = $_POST['mail'];
            $haslo = $_POST['haslo'];
            $news = filter_input(INPUT_POST, 'news');
        ?>

            <table class="second" id="second">
                <tr><td>Imie: </td>
                    <td><?php echo $imie_d;?></td>
                </tr>
                <tr><td>Nazwisko: </td>
                    <td><?php echo $nazwisko_d;?></td>
                </tr>
                <tr><td>Mail: </td>
                    <td><?php echo $mail;?></td>
                </tr>
                <tr><td>Hasło: </td>
                    <td><?php echo $haslo;?></td>
                </tr>
                <tr><td></td>
                    <td><?php 
                    if($news){
                        echo "Newsletter: $news<br><br>";
                    }else{
                        echo $errors['news'] = "Newsletter: off<br><br>";
                    }
                    ?></td>
                </tr>
            </table>
        <a class="back" href="index.php"><b>Go Back <--</b></a>
    </div>
</body>
</html>