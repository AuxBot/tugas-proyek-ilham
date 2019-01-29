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
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/materialize.js"></script>
    
    <style>
        .btm-line{
            border-bottom:1px solid grey;
        }
        .box-line{
            border:1px solid grey;
        }
        .inputFile
        {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }
    </style>

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
            <li><a href="galeri">UNGGAH</a></li>
            <li><a href="pengaturan/">Pengaturan</a></li>
            <li><div class="divider"></div></li>
            <li><a href="logout.php">LOGOUT</a></li>
        </ul>
    </div>
</div>
<!--body-->
<form action="data/submitCreation.php" method="post" id="submitCreation" enctype="multipart/form-data">
<div class="container row">
    <div class="col s8">
        <div class="col s12">
            <input type="text" name="namaSubmit" id="" placeholder="Judul">

            <input type="file" name="fileUpload" id="fileUpload" class="inputFile">
            <label for="fileUpload">
            <div class="form col s12" style="border:1px solid grey;background-color:gainsboro;height:360px;max-height:360px;">
                <img style="width:100%;height:100%;" id="preview" />
            </div>
            </label>

            <div class="form input-field col s12 box-line">
                <div class="col s12 btm-line">Deskripsi</div>
                <textarea form="submitCreation" placeholder="Deskripsi" id="deskripsi" style="border-bottom:0px" class="materialize-textarea"></textarea>
                <label for="deskripsi"></label>
            </div>
            <div class="form input-field col s12 box-line">
                <div class="col s12 btm-line">Kategori</div>
                <div class="form col s12" style="margin-top:10px;">
                    <div class="col s3">
                        <label>
                            <input type="checkbox" name="kategori" class="filled-in">
                            <span>Sketsa</span>
                        </label>
                    </div>
                    <div class="col s3">
                        <label>
                            <input type="checkbox" name="kategori" class="filled-in">
                            <span>Grafis</span>
                        </label>
                        </div>
                    <div class="col s3">
                        <label>
                            <input type="checkbox" name="kategori" class="filled-in">
                            <span>Lukis</span>
                        </label></div>
                    <div class="col s3">
                        <label>
                            <input type="checkbox" name="kategori" class="filled-in">
                            <span>Ukir</span>
                        </label>
                    </div>
                    <div class="col s3">
                        <label>
                            <input type="checkbox" name="kategori" class="filled-in">
                            <span>Pahat</span>
                        </label>
                    </div>
                    <div class="col s3">
                        <label>
                            <input type="checkbox" name="kategori" class="filled-in">
                            <span>Sastra</span>
                        </label>
                    </div>
                    <div class="col s3">
                        <label>
                            <input type="checkbox" name="kategori" class="filled-in">
                            <span>Musik</span>
                        </label>
                    </div>
                    <div class="col s3">
                        <label>
                            <input type="checkbox" name="kategori" class="filled-in">
                            <span>Tari</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---------->
    <div class="col s4">
        <div class="col s12">
            <input type="button" value="submit" class="btn col s12">
            <div class="form input-field col s12 box-line">
                <div class="col s12 btm-line">Download able</div>
                <div style="margin:10px 0px" style="">
                    <label class="col s6"><input type="radio" name="downloadAble" class="with-gap" value="no" id=""><span>NO</span></label>
                    <label class="col s6"><input type="radio" name="downloadAble" class="with-gap" value="yes" id=""><span>YES</span></label>
                </div>
            </div>
            <div class="form input-field col s12 box-line">
                <div class="col s12 btm-line">Jual</div>
                <div style="margin:10px 0px" style="">
                    <label class="col s6" id="No" onclick="jualNo()"><input type="radio" name="jual" class="with-gap" value="no"><span>NO</span></label>
                    <label class="col s6" id="Yes" onclick="jualYes()"><input type="radio" name="jual" class="with-gap" value="yes"><span>YES</span></label>
                </div>
            </div>
            <div class="modalJual" id="modalJual">
                <ul id="harga" class="">
                    <li><span class="col s12">harga tetap</span>
                        <ul>
                            <li>
                                <div>
                                    <input type="text" name="hargaTetap" class="col s9"><span class="col s3">Rb</span>
                                </div>
                            </li>
                        </ul>
                        </li>
                    <li><span class="col s12">harga diantara</span>
                        <ul>
                            <li>
                                <div>
                                    <input type="text" name="hargaDiantara" class="col s3"><span class="col s3">Rb - </span>
                                    <input type="text" name="hargaDiantara" class="col s3"><span class="col s3">Rb</span>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</form>

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
//---------------------------------------------//
//------------radio----------------------------//

function jualNo(){
    document.getElementById("modalJual").style.display = 'none';
}

function jualYes(){
    document.getElementById("modalJual").style.display = 'block';
}

//---------------------------------------------//

//wrapping text area
$('#deskripsi').val('');
M.textareaAutoResize($('#deskripsi'));

//preview foto
document.getElementById('fileUpload').onchange = function(){
    var reader = new FileReader();
    reader.onload = function(e){
        document.getElementById('preview').src = e.target.result;
    };
    reader.readAsDataURL(this.files[0]);
};

function jualHarga(){

}

</script>
</body>
</html>