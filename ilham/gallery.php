<?php
require 'data/conn.php';
if(@$_SESSION['uid'] == null){
    header('location:../index.php');
}else{
    $sql = "SELECT * FROM anggota WHERE id = '$_SESSION[uid]'";
    $run = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($run);
}
require 'common/navbar.php';
require 'common/sn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Galleri</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/materialize.css">
    <link rel="stylesheet" href="css/cssDewe.css">
</head>
</head>
<body>
<?php navbar($satu,$dua,$jasa,$gambar,$tiga);?>
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
<!--body-->

<p>YO</p>

<!--end body-->
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