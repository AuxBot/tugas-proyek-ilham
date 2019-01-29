<?php
require 'conn.php';
date_default_timezone_set('Asia/Jakarta');

$username = "";
$nama     = "";
$password = "";
$email    = "";
$telp     = "";
$errors   = array();
$s = date("H:i:s");
echo $s;

if (isset($_POST['register'])){
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    

    if (empty($username)) {echo"Username Kosong";}
    if (empty($nama)) {echo "Nama kosong";}
    if (empty($pass)) {echo"Password kosong";}
    if (empty($email)) {echo"Email kosong";}
    if (empty($telp)) {echo"NoTelp Kosong";}

    $user_check = "SELECT * FROM anggota WHERE username='$username' OR email='$email' OR telp='$telp' LIMIT 1";
    $run = mysqli_query($conn,$user_check);
    $user = mysqli_fetch_assoc($run);

    if ($user){
        if($user['username']===$username){
            ($errors[] = "Username telah diambil");
        }
        if($user['email']===$email){
            ($errors[] = "Email telah digunakan");
        }
        if($user['telp']===$telp){
            ($errors[] = "Nomer ponsel sudah digunakan");
        }
        foreach($errors as $error){
            echo $error, '<br>';
        }
    }

    if (count($errors)==0){
        $password = md5($pass);
        $waktu = date("Y-m-d H:i:s");
        $query = "INSERT INTO anggota (id, username, nama, pass, email, telp, waktu) VALUES ('', '$username', '$nama', '$password', '$email', '$telp', '$waktu')";
        mysqli_query($conn,$query);
        $_SESSION['username'] = $username;
        header('location: home.php');
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function cekAngka(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                retrun false;
            retrun true;
        }

        fuction sepass() {
            var x = document.getElementById("pass") {
                if (x.type ==="password"){
                    x.type = "text";
                }
            }else{
                x.type = "password";
            };
        }
    </script>
</head>
<body>
    <form action="register.php" method="post">
    <table>
        <tr><td>
            <input required type="text" name="username" placeholder="Username" maxlength="11"/>
        </td></tr>
        <tr><td>
            <input required type="text" name="nama" placeholder="Nama Lengkap" maxlength="30">
        </td></tr>
        <tr><td>
            <input required type="password" id="pass" name="pass" placeholder="Password"/>
        </td><td>
        </td></tr>
        <tr><td>
            <input required type="text" name="email" placeholder="Email" maxlength="30"/>
        </td></tr>
        <tr><td>
            <input required type="number" name="telp" placeholder="NoTelp" onkeypress="cekAngka" maxlength="13"/>
        </td></tr>
        <tr><td>
            <input type="submit" name="register" value="Register"/>
        </td></tr>
    </table>
    </form>
</body>
</html>