<?php
require '../data/conn.php';
if(@$_SESSION['uid'] != null){
    $sql = "SELECT * FROM anggota WHERE id = '$_SESSION[uid]'";
    $run = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($run);
}

$dirName = "../galeri/user_image/".$rows['username'];
if(!is_dir($dirName)){
    (mkdir("../profil/user_image/".$rows['username'], 0755));
}

$targetDir = '../galeri/user_image/'.$rows['username'].'/';

$name = $rows['username'];
basename($_FILE['fileUpload']['name']);
$uploadOk = 1;
$imageFileType = pathinfo($_FILES['fileUpload']['name'],PATHINFO_EXTENSION);
$check = getimagesize($_FILES['fileUpload']['tmp_name']);
//namenamenamenamenamename


//namenamenamenamenamename

if(isset($_POST['upload'])){
    if($check != false){
        echo 'file is an image - '.$check['mime'].'.</br>';
    }
}
?>