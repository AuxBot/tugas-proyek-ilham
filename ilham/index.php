<?php
require 'data/conn.php';

//login
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
            //header('location:home.php');
        }else{
            echo "username atau password salah";
        }
    }
}

//cek user
if(@$_SESSION['uid'] != null){
    $sql = "SELECT * FROM anggota WHERE id = '$_SESSION[uid]'";
    $run = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($run);
}

function cekSession($conn,$rows ){
$sql = "SELECT * FROM anggota WHERE id = '$_SESSION[uid]'";
$run = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($run);
}
if(isset($_SESSION['uid'])){
    cekSession($conn,$rows);
}else{

}
require 'common/navbar.php';
require 'common/sn.php';

//register
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
    <title>plzendmysuffering</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/materialize.css">
    <link rel="stylesheet" href="css/cssDewe.css">
</head>
<body>

    <?php
    navbar($satu,$dua,$jasa,$gambar,$tiga);

    if(isset($_SESSION['uid'])){
        echo $sidenav;
    }
    ?>

<div class="container">
</div>
<!--login-->
<div id="modallogin" class="modalcontainer">
    <div id="login" class="login z-depth-1">
    <form action="#" method="post">
        <ul>
            <li>
                <input type="text" name="username" placeholder="Username" required/>
            </li>
            <li>
                <input type="password" name="pass" placeholder="Password" required/>
            </li>
            <li>
                <input type="submit" name="login" value="login" class="btn-small">
            </li>
        </ul>
    </form>
    </div>
</div>

<!--register-->
<div id="modalregis" class="modalcontainer">
    <div id='register' class="login z-depth-1">
        <form action="" method="post">
            <ul>
                <li>
                    <input required type="text" name="username" placeholder="Username" maxlength="11"/>
                </li>
                <li>
                    <input required type="text" name="nama" placeholder="Nama Lengkap" maxlength="30">
                </li>
                <li>
                    <input required type="password" id="pass" name="pass" placeholder="Password"/>
                </li>
                <li>
                    <input required type="text" name="email" placeholder="Email" maxlength="30"/>
                </li>
                <li>
                    <input required type="number" name="telp" placeholder="NoTelp" onkeypress="cekAngka" maxlength="13"/>
                </li>
                <li>
                    <input type="submit" name="register" value="Register" class="btn-small"/>
                </li>
            </ul>
        </form>
    </div>
</div>

<!--menu-->
<div id="modalmenu" class="modalcontainer">
    
    <div id="menu" class="menu z-depth-1">
    <div class="menu-pointer"></div>
        <ul>
            <li style="color:grey;">Menu pengguna</li>
            <li><a href="profil"><?php echo $rows['nama']; ?></a></li>
            <li><a href="galeri">Galeri</a></li>
            <li><a href="pengaturan/">Pengaturan</a></li>
            <li><div class="divider"></div></li>
            <li><a href="logout.php">LOGOUT</a></li>
        </ul>
    </div>
</div>

<script>

var modallogin = document.getElementById("modallogin");
function bukalogin(){
    modallogin.style.display = 'block';
}

var modalregis = document.getElementById("modalregis");
function bukaregis(){
    modalregis.style.display = 'block';
}

var modalmenu = document.getElementById("modalmenu");
function bukamenu(){
    modalmenu.style.display = 'block';
}

// When the user clicks anywhere outside of the modal, close it

window.addEventListener('click',function(event) {
    if (event.target == modallogin) {
        modallogin.style.display = "none";
    }
});

window.addEventListener('click',function(event) {
    if (event.target == modalregis) {
        modalregis.style.display = "none";
    }
});

window.addEventListener('click', function(event) {
    if (event.target == modalmenu) {
        modalmenu.style.display = "none";
    }
})

</script>

</body>
</html>