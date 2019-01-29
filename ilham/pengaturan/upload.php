<?php
require "../data/conn.php";
if(@$_SESSION['uid'] != null){
    $sql = "SELECT * FROM anggota WHERE id = '$_SESSION[uid]'";
    $run = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($run);
}

$dirName = "../profil/user_image/".$rows['username'];
if(!is_dir($dirName)){
    ( mkdir("../profil/user_image/".$rows['username'], 0755));
}

$targetDir = "../profil/user_image/".$rows['username']."/";
$targetFile = $targetDir;

$name = $rows['username'];
basename($_FILES["fileToUpload"]["name"]);
$uploadOK = 1;
$imageFileType = pathinfo($_FILES['fileToUpload']['name'],PATHINFO_EXTENSION);
$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
$jpgName = $name."."."jpg";
$pngName = $name."."."png";
$gifName = $name."."."gif";

if(isset($_POST["upload"])){
    
    if($check !==false){
        echo "file is an image - ".$check["mime"].".</br>";
        $uploadOK = 1;
    }else{
        echo "file is not an image - ".$check["mime"].".</br>";
        $uploadOK = 0;
    }
}

if($_FILES["fileToUpload"]["size"] > 5000000){
    echo "sorry your file is to large</br>";
    $uploadOK = 0;
}
echo $check['mime']."<?br>";
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
    echo "sorry only image format are allowed</br>";
    $uploadOK = 0;
}

if($uploadOK == 0){
    echo "your file is not uploaded</br>";
}

if($uploadOK==1){
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$targetFile.$pngName)){
        "file ".basename($_FILES["fileToUpload"]["name"])."has been uploaded.</br>";
        $query = "UPDATE anggota SET usrimg = '$pngName' WHERE id = '$rows[id]'";
        $run = mysqli_query($conn,$query);
        if($run){
            header('location: index.php');
        }else{
            echo ":/ ada sesuatu yang error, tolong hubungi developer error:pengaturan/upload.php line 71";
        }
    }else{
        echo "error uploading file</br>";
    }
}
/*
if($uploadOK==1 && $imageFileType == "gif"){
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$targetFile.$gifName)){
        "file ".basename($_FILES["fileToUpload"]["name"])."has been uploaded.</br>";
        $query = "UPDATE anggota SET usrimg = '$gifName' WHERE id = '$rows[id]'";
        $run = mysqli_query($conn,$query);
        if($run){
            header('location: index.php');
        }else{echo ":/ ada sesuatu yang error, tolong hubungi developer error:pengaturan/upload.php line 82";}
    }else{
        echo "error uploading file</br>";
    }
}

if($uploadOK==1 && $imageFileType == "jpg"){
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$targetFile.$jpgName)){
        "file ".basename($_FILES["fileToUpload"]["name"])."has been uploaded.</br>";
        $query = "UPDATE anggota SET usrimg = '$jpgName' WHERE id = '$rows[id]'";
        $run = mysqli_query($conn,$query);
        if($run){
            header('location: index.php');
        }else{
            echo ":/ ada sesuatu yang error, tolong hubungi developer error:pengaturan/upload.php line 59";
        }
    }else{
        echo "error uploading file</br>";
    }
}

if($uploadOK==1 && $imageFileType == "jpeg"){
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$targetFile.$jpgName)){
        "file ".basename($_FILES["fileToUpload"]["name"])."has been uploaded.</br>";
        $query = "UPDATE anggota SET usrimg = '$jpgName' WHERE id = '$rows[id]'";
        $run = mysqli_query($conn,$query);
        if($run){
            header('location: index.php');
        }else{
            echo ":/ ada sesuatu yang error, tolong hubungi developer error:pengaturan/upload.php line 59";
        }
    }else{
        echo "error uploading file</br>";
    }
}
*/
?>