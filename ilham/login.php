<?php
require 'data/conn.php';

echo $_SESSION['uid'];

$user = "";
$pass = "";

if(isset($_POST['login'])){
    $user = $_POST['username'];
    $pass = $_POST['pass'];
    
    if (empty($user)) {("Username kosong");}
    if (empty($pass)) {("Passwod kosong");}

    if (!empty($user . $pass)){
        $pass = md5($pass);
        $query  = ("SELECT * FROM anggota WHERE username='$user' AND pass='$pass' LIMIT 1");
        $run = mysqli_query($conn, $query);
        $rows = mysqli_fetch_assoc($run);
        if ($rows > 0){
            $_SESSION['uid'] = $rows["id"];
            echo $_SESSION['uid'];
            //header('location:home.php');
        }else{
            echo "username atau password salah";
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <script src="main.js"></script>
</head>
<body>
    <form action="./css/yeah.php" method="post">
    <table>
        <tr><td>Loginjancok</td></tr>
        <tr><td>
                <input style="color:black;" type="text" name="username" placeholder="Username"/>
            </td></tr><tr><td>
                <input type="text" name="pass" placeholder="Password"/>
            </td></tr><tr><td>
                <input type="submit" name="login" value="login">
                <a href="register.php">Daftar</a>
            </td>
        </tr>
    </table>
    </form>
</body>
</html>