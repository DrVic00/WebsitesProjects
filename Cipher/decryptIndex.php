<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylePHP.css">
    <link rel="icon" href="spyware.png">
    <title>Decrypt</title>
</head>
<body class="DImain">
    <main class="DIMwidth">
        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'agenci');
        $query2 = "SELECT id FROM szyfry";
        $result = mysqli_query($conn, $query2);
        echo "<table border='1'>
        <tr>
        <th>Id</th>
        <th>Szyfr</th>
        </tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . "-----------********__________There_is_some_cipher_here__________********-----------" . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
        <br>
        <form method="POST" action="">
            <label for="">Wybierz Id rekordu który chcesz odszyfrować: </label>
            <input type="text" name="idTD">
            <input type="submit" name="submit" class="submit" value="Submit">
        </form>

        <?php
            // SZYFR PRZESTAWIENIOWY
            class SwitchEncrypt{

                public function switchDecrypt($textTD){
                    $textTD = strtoupper($textTD);
                    $dl = strlen($textTD);
                    for($i=0; $i<$dl-1; $i+=2){
                        $pom = $textTD[$i];
                        $textTD[$i] = $textTD[$i+1];
                        $textTD[$i+1] = $pom;	
                    }
                    return $textTD ;
                }

            }

            class Homophonic {
                private $hNumbers = array(
                    'A' => array('65', '43', '13'),
                    'B' => array('182', '80'),
                    'C' => array('27', '11', '30'),
                    'D' => array('41', '31'),
                    'E' => array('202', '23', '78'),
                    'F' => array('48', '52'),
                    'G' => array('25', '152', '61'),
                    'H' => array('171', '14'),
                    'I' => array('212', '53', '221'),
                    'J' => array('74', '24', '91'),
                    'K' => array('56', '21'),
                    'L' => array('16', '95', '47'),
                    'M' => array('39', '63'),
                    'N' => array('19', '50', '141'),
                    'O' => array('151', '18', '82'),
                    'P' => array('22', '81', '163'),
                    'Q' => array('37', '172'),
                    'R' => array('181', '17', '183'),
                    'S' => array('44', '192'),
                    'T' => array('201', '203'),
                    'U' => array('211', '46'),
                    'V' => array('60', '222', '223'),
                    'W' => array('131', '102'),
                    'X' => array('241', '62', '71'),
                    'Y' => array('251', '66'),
                    'Z' => array('98', '10', '263')
                );
            
                public function homophonicDecrypt($textTD) {
                    // Podziel zaszyfrowany tekst na pojedyncze elementy
                    $elements = explode(' ', $textTD);
                    $textAD = '';
            
                    foreach ($elements as $element) {
                        if ($element == '.') {
                            $textAD .= ' ';
                        } else {
                            foreach ($this->hNumbers as $char => $numbers) {
                                foreach ($numbers as $number) {
                                    if ($number == $element) {
                                        $textAD .= $char;
                                        break;
                                    }
                                }
                            }
                        }
                    }
            
                    return $textAD;
                }
            }

            class Cezar {
                private $alphabet = 'ABCDEFGHIJKLMNOPRSTUWYZ';
                private $cipher =   'CDEFGHIJKLMNOPRSTUWYZAB';
            
                function cezarDecrypt($textTD) {
                    $textAD = '';
                    $textTD = strtoupper($textTD);
            
                    for ($i = 0; $i < strlen($textTD); $i++) {
                        $char = $textTD[$i];
            
                        if (ctype_alpha($char)) {
                            $index = strpos($this->cipher, $char);
                            $decrypted_char = $this->alphabet[$index];
                            $textAD .= $decrypted_char;
                        } else {
                            $textAD .= $char;
                        }
                    }
            
                    return $textAD;
                }
            }

            class FractionalCipher {
                private $keys = array(
                    1 => array('A','B','C','D','E'),
                    2 => array('F','G','H','I','J'),
                    3 => array('K','L','M','N','O'),
                    4 => array('P','R','S','T','U'),
                    5 => array('W','X','Y','Z')
                );
            
                function fractionalDecrypt($textTD) {
                    $textAD = '';
                    $textTD = rtrim($textTD);
                    $elements = explode(' ', $textTD);
                    foreach ($elements as $element) {
                        if ($element == ' ') {
                            $textAD .= '';
                        } else if($element == '.'){
                            $textAD .= ' ';
                        } else {
                            // Podziel element na licznik i mianownik
                            list($numerator, $denominator) = explode('/', $element);
                            // Sprawdź, czy mianownik jest w kluczach
                            if (array_key_exists($denominator, $this->keys)) {
                                $position = $numerator - 1;
                                $key = $this->keys[$denominator];
                                if (isset($key[$position])) {
                                    $textAD .= $key[$position];
                                }
                            } else {
                                $textAD .= $element;
                            }
                        }
                    }
                    return $textAD;
                }
            }

        if(isset($_POST['submit'])){
            $idTD = $_POST['idTD'];
            $query3 = "SELECT szyfr, typ FROM szyfry WHERE id=$idTD";
            $result = $conn->query($query3);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $textTD = $row['szyfr'];
                $selectedType = $row['typ'];
                // echo $textTD." ".$selectedType;
                if($selectedType == "BasicIncrypt"){
                    $switchDecrypt = new SwitchEncrypt();
                    $cipher = $switchDecrypt->switchDecrypt($textTD);
                }else if($selectedType == "Homophonic"){
                    $homoCipher = new Homophonic();
                    $cipher = $homoCipher->homophonicDecrypt($textTD);
                }else if($selectedType == "Cezar"){
                    $cezarCipher = new Cezar();
                    $cipher = $cezarCipher->cezarDecrypt($textTD);
                }else if($selectedType == "Fractional"){
                    $fractionalCipher = new FractionalCipher();
                    $cipher = $fractionalCipher->fractionalDecrypt($textTD);
                }
                echo "Tekst zaszyfrowany: ".$textTD."<br>"."Typ szyfrowania: ".$selectedType."<br>"."Tekst odszyfrowany: ".$cipher;


            }else{
                echo "Nie ma szyfru o tym id";
            }

        }
        
        ?>
    </main>
</body>
<footer>
    <a href="main.php">Go back main page</a>
    <br><a href="logout.php">Logout</a>
</footer>
</html>