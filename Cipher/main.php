<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleMain.css">
    <link rel="icon" href="spyware.png">
    <title>SpyHub</title>
</head>
<body>
    <header>
        <img src="spy.png" alt="SpyHubLogo">
        <h1>SpyHub</h1>
        <p>Welcome</p>
    </header>
    <main>
        <form method="post" action="">
            <table>
                <tr>
                    <td><label for="username">Username:</label></td>
                    <td><input type="text" id="username" name="username" class="to_full"></td>
                </tr>
                <tr>
                    <td><label for="password">Password:</label></td>
                    <td><input type="text" id="password" name="password" class="to_full"></td>
                </tr>
            </table>
            <br>
            <input type="submit" name="submit" class="submit" value="Submit">
        </form>
        <a href="index.html">Add encryption</a>
    </main>
    <footer>
        <a href="https://github.com/">Any other community</a>
    </footer>
</body>
</html>

<?php
session_start();

if(isset($_SESSION['username'])) {
    header("Location: welcome.html");
    exit;
}

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = mysqli_connect('localhost', 'root', '', 'agenci');
    $query4 = "SELECT username, password FROM szpiedzy WHERE id_szpiega=1";
    $result = $conn->query($query4);
    $row = $result->fetch_assoc();
    $real_username = $row['username'];
    $real_password = $row['password'];
    $conn->close();

    if($username === $real_username && $password === $real_password) {
        $_SESSION['username'] = $username;
        header("Location: welcome.html");
        exit;
    } else {
        echo "Nieprawidłowa nazwa użytkownika lub hasło.";
    }
}