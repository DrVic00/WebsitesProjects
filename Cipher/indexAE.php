<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylePHP.css">
    <link rel="icon" href="spyware.png">
    <title>After Encrypt</title>
</head>
<body>

    <?php
        // SZYFR PRZESTAWIENIOWY
        class SwitchEncrypt{

            public function switchEncrypt($textTE){
                $textTE = strtoupper($textTE);
                $dl = strlen($textTE);
                for($i=0; $i<$dl-1; $i+=2){
                    $pom = $textTE[$i];
                    $textTE[$i] = $textTE[$i+1];
                    $textTE[$i+1] = $pom;	
                }
                return $textTE ;
            }

        }

        // SZYFR HOMOFONICZNY PODSTAWIENIOWY
        class Homophonic{

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
                'T' => array('201', '13', '203'),
                'U' => array('211', '46'),
                'V' => array('60', '222', '223'),
                'W' => array('131', '102'),
                'X' => array('241', '62', '71'),
                'Y' => array('251', '66'),
                'Z' => array('98', '10', '263')
            );

            public function homophonicEncrypt($textTE) {
                $textTE = strtoupper($textTE);
                $textAE = '';
                for ($i = 0; $i < strlen($textTE); $i++) {
                    $char = $textTE[$i];
                    if (array_key_exists($char, $this->hNumbers)) {
                        $rand_index = array_rand($this->hNumbers[$char]);
                        $textAE .= $this->hNumbers[$char][$rand_index] . ' ';
                    } else {
                        $textAE .= $char . ' . ';
                    }
                }
                return $textAE;
            }
        }

        // SZYFR CEZARA
        class Cezar{

            private $alphabet = 'ABCDEFGHIJKLMNOPRSTUWYZ';
            private $cipher =   'CDEFGHIJKLMNOPRSTUWYZAB';


            function cezar($textTE) {
                $textAE = '';
                $textTE = strtoupper($textTE);
        
                for ($i = 0; $i < strlen($textTE); $i++) {
                    $char = $textTE[$i];
        
                    if (ctype_alpha($char)) {
                        $index = strpos($this->alphabet, $char);
                        $encrypted_char = $this->cipher[$index];
                        $textAE .= $encrypted_char;
                    } else {
                        $textAE .= $char;
                    }
                }
        
                return $textAE;
            }

        }

        // SZYFR_UŁAMKOWY
        class FractionalCipher{
            private $keys = array(
                1 => array('A','B','C','D','E'),
                2 => array('F','G','H','I','J'),
                3 => array('K','L','M','N','O'),
                4 => array('P','R','S','T','U'),
                5 => array('W','X','Y','Z')
            );

            function fractional($textTE) {
                $textAE = '';
                $textTE = strtoupper($textTE);
                $letters = str_split($textTE);
                $num_keys = count($this->keys);

                foreach ($letters as $letter) {
                    if (ctype_alpha($letter)) {
                        foreach ($this->keys as $denominator => $key) {
                            if (in_array($letter, $key)) {
                                $position = array_search($letter, $key);
                                $numerator = $position + 1;
                                $textAE .= $numerator . '/' . $denominator . ' ';
                                break; 
                            }
                        }
                    } else {
                        $textAE .= ". ";
                    }
                }

                return $textAE;
            }
        }

        $conn = mysqli_connect("localhost", "root", "", "agenci");
        
        if(isset($_POST['submit'])){
            $textTE = $_POST['textTE'];
            $selectedType = $_POST['cipherType'];
            if(!empty($textTE)){
                if($selectedType == "BasicIncrypt"){
                    $switchEncrypt = new SwitchEncrypt();
                    $cipher = $switchEncrypt->switchEncrypt($textTE);
                }else if($selectedType == "Homophonic"){
                    $homoCipher = new Homophonic();
                    $cipher = $homoCipher->homophonicEncrypt($textTE);
                }else if($selectedType == "Cezar"){
                    $cezarCipher = new Cezar();
                    $cipher = $cezarCipher->cezar($textTE);
                }else if($selectedType == "Fractional"){
                    $fractionalCipher = new FractionalCipher();
                    $cipher = $fractionalCipher->fractional($textTE);
                }
                $query1 = "INSERT INTO szyfry (szyfr, typ) VALUES ('$cipher', '$selectedType') ";
                if($conn->query($query1)){
                    echo "Tekst zostal zaszyfrowany i dodany do bazy danych: ".$cipher;
                    $conn->close();
                    ?>
                    <br><a href="index.html">Return to encryption page</a>
                    <br><p>or</p>
                    <br><a href="main.php">Go to main page</a>
                    <br><p>or</p>
                    <br><a href="logout.php">Logout</a>
                    <?php
                }
            }else{
                echo "Napisz co mam zaszyfrowac";
                ?>
                <br><a href="index.html">Return to encryption page</a>
                <br><p>or</p>
                <br><a href="decryptIndex.php">Go to decryption page</a>
                <?php
            }
            
            
        }
        
    ?>
    
</body>
</html>