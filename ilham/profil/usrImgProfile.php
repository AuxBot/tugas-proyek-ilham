<?php
if(@$_SESSION['uid']!= null){
if($rows['usrimg'] != null){
    $Pimage ="<img class='profilFoto' src='../profil/user_image/".$rows['username']."/".$rows['usrimg']."' alt=''>";
    $navbarImg = "<img class='usr-pic-nav circle' src='../profil/user_image/".$rows['username']."/".$rows['usrimg']."' alt=''>";
    $navbarImg2 = "<img class='usr-pic-nav circle' src='profil/user_image/".$rows['username']."/".$rows['usrimg']."' alt=''>";
    $navbarImg3 = "<img class='usr-pic-nav circle' src='user_image/".$rows['username']."/".$rows['usrimg']."' alt=''>";
    $sideNavImg = "<img id='front-page-logo' src='profil/user_image/".$rows['username']."/".$rows['usrimg']."' alt=''>";
    $sideNavImg2 = "<img id='front-page-logo' src='../profil/user_image/".$rows['username']."/".$rows['usrimg']."' alt=''>";
    $sideNavImg3 = "<img id='front-page-logo' src='user_image/".$rows['username']."/".$rows['usrimg']."' alt=''>";
}else{
    $Pimage ="<img class='profilFoto' src='../up/default.jpg' alt=''  >";
    $navbarImg = "<img class='usr-pic-nav circle' src='../up/vanilla.jpg' alt=''";
    $navbarImg2 = "<img class='usr-pic-nav circle' src='up/vanilla.jpg' alt=''";
    $navbarImg3 = "<img class='usr-pic-nav circle' src='../up/vanilla.jpg' alt=''>";
    $sideNavImg = "<img id='front-page-logo' src='up/vanilla.jpg' alt=''";
    $sideNavImg2 = "<img id='front-page-logo' src='../up/vanilla.jpg' alt=''";
    $sideNavImg3 = "<img id='front-page-logo' src='../up/vanilla.jpg' alt=''";
}}else{
    $Pimage = '';
    $img = '';
    $navbarImg = '';
    $navbarImg2 = '';
    $navbarImg3 = '';
    $sideNavImg = '';
    $sideNavImg2 = '';
    $sideNavImg3 = '';
}
?>