<?php
$varProfil = 1;
require '../data/conn.php';
if(@$_SESSION['uid'] != null){
    $sql = "SELECT * FROM anggota WHERE id = '$_SESSION[uid]'";
    $run = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($run);
}
require '../common/navbar3.php';

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/materialize.css">
    <link rel="stylesheet" href="../css/cssDewe.css">
    <title>Document</title>
    <style>
    .profilFoto{
        border: 1px solid black;
        border-radius:10px;
        width:310px;
    }
    </style>
</head>
<body>
    <?php
    navbar($satu,$dua,$jasa,$gambar,$tiga);

    if(isset($_SESSION['uid'])){
    }
    
    ?>
     <!--menu-->
     <div id="modalmenu" class="modalcontainer">
        <div id="menu" class="menu z-depth-1">
        <div class="menu-pointer"></div>
            <ul>
                <li style="color:grey;">Menu pengguna</li>
                <li><a href=""><?php echo $rows['nama']; ?></a></li>
                <li><a href="../pengaturan">Pengaturan</a></li>
                <li><div class="divider"></div></li>
                <li><a href="../logout.php">LOGOUT</a></li>
            </ul>
        </div>
    </div>
    <div class='container'>
        <center>
            <div class='z-depth-2' style='width:100%;margin:10px;padding:10px;'>
                <div class='row'>
                    <div class='col s6'>
                        <div style="position: relative">
                            <?php echo $Pimage; ?>
                        </div>
                    </div>
                    <div class='col s6'>
                        <div class='col s12 flow-text'>
                            <span style="float: left!important">
                                <?php echo $rows['nama'];?>
                            </span>
                        </div>
                        <div class='col s12 flow-text'>
                            <?php echo $rows['username'];?>
                        </div>
                        <div class='col s12 flow-text'>
                            <?php echo $rows['email'];?>
                        </div>
                        <div class='col s12 flow-text'>
                            <?php echo $rows['telp'];?>
                        </div>
                        <div class='col s12 flow-text'>
                            <?php echo $rows['waktu'];?>
                        </div>
                        <div class='col s12'>
                            <?php if($rows['upload'] > 0 ){echo $rows['upload'];}else{echo 'anda masih belum mengupload apapun';}?>
                        </div>
                    </div>
                </div>
            </div>
        </center>
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

    document.getElementById("fileToUpload").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("image").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);

};
</script>
</body>
</html>