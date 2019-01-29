<?php
require '../data/conn.php';
if(@$_SESSION['uid'] == null){
    header('location:../index.php');
}else{
    $sql = "SELECT * FROM anggota WHERE id = '$_SESSION[uid]'";
    $run = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($run);
}
require '../common/navbar2.php';
require '../common/sn.php';
//gantiProfil
if(isset($_POST['submit'])){
    $id = $_SESSION['uid'];
    @$nama = $_POST['nama'];
    @$telp = $_POST['telp'];
    @$email = $_POST['email'];

    if($nama == null){$nama = $rows['nama'];};
    if($telp == null){$telp = $rows['telp'];};
    if($email == null){$email = $rows['email'];};

    $sqlUpdate = "UPDATE anggota SET nama = '$nama', email = '$email', telp = '$telp' WHERE id = '$id'";
    mysqli_query($conn,$sqlUpdate);
};
require "../profil/usrImgProfile.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>plzendmysuffering</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/materialize.css">
    <link rel="stylesheet" href="../css/cssDewe.css">

    <style>
    
    .profilFoto{
        border: 1px solid black;
        border-radius:10px;
        max-width:310px;
        width: 310px;   
    }
    .inputFile{
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }
    .inputFile + label{
        border: none;
        text-decoration: none;
        letter-spacing: .5px;
        font-size: 14px;
        color: #fff;
        background-color: #d3394c;
        text-overflow: ellipsis;
        display: inline-block;
        overflow: hidden;
        padding: 0px 16px;
        max-width: 80%;
        cursor: pointer;
        text-align: center;
        border-radius: 2px;
        height: 36px;
        line-height: 36px;
        text-transform: uppercase;
        box-shadow: 0 3px 3px 0 rgba(0, 0, 0, 0.14);
        -webkit-box-shadow:  0 3px 3px 0 rgba(0, 0, 0, 0.14);
    }
    .inputFile:focus + label,
    .inputFile + label:hover{
        background-color: #f009;
    }
    .inputFile:focus + label,
    .inputFile.has-focus + label {
        outline: 1px dotted #000;
        outline: -webkit-focus-ring-color auto 5px;
    }
    
    </style>
</head>
<body>
    <?php
        navbar($satu,$dua,$jasa,$gambar,$tiga);

        if(isset($_SESSION['uid'])){
            echo $sidenav2;
        }
    ?>

    <!--menu-->
    <div id="modalmenu" class="modalcontainer">
        <div id="menu" class="menu z-depth-1">
        <div class="menu-pointer"></div>
            <ul>
                <li style="color:grey;">Menu pengguna</li>
                <li><a href="../profil/"><?php echo $rows['nama']; ?></a></li>
                <li><a href="#">Pengaturan</a></li>
                <li><div class="divider"></div></li>
                <li><a href="../logout.php">LOGOUT</a></li>
            </ul>
        </div>
    </div>

    <div class="container row">
        <div style="margin:10px;">
            <div class="col s6" >
                <div style="position:relative;">
                    <?php echo $Pimage; ?>
                </div>
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="fileToUpload" id="fileToUpload" class="inputFile">
                    <label for="fileToUpload">Pilih File</label>
                    <input type="submit" value="Upload Image" name="upload" class="btn">
                    <div>
                        <img style="max-width:180px;border-radius:5px;" id="image" />
                    </div>
                </form>
            </div>
            <form action="#" method="post">
            <div class="col s6"><span class="flow-text"style="float: right!important;"><h2>Biodata Diri</h2></span>
                <div class="col s12">
                    <span class="flow-text" style="float: left!important;">id#<?php echo $_SESSION['uid'];?></span>
                    <span class="flow-text" style="float: right!important;"><?php echo $rows['username'];?></span>
                </div>
                <div class="col s12"><input name="nama" type="text" placeholder="Nama : <?php echo $rows['nama'];?>"></div>
                <div class="col s12"><input name="telp" type="text" placeholder="Kontak : <?php echo $rows['telp'];?>"></div>
                <div class="col s12"><input name="email" type="text" placeholder="E-mail : <?php echo $rows['email'];?>"></div>
                <div class="col s6"><input name="submit" type="submit" value="Kirim perubahan" class="btn btn-submit"></div>
                <div class="col s6"><input type="button" value="kembali"></div>
            </div>
        </div>
        </form>
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