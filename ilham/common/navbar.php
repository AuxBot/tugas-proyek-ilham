<?php
require "profil/usrImgProfile.php";

$jasa ='<li><a href="#"><b>buka jasa</b></a></li>';

$satu = '
<nav>
<div class="navbar-fixed">
<a href="">
    <img src="up/akh.png" class="brand-logo" alt="" style="height: 100%;padding: 5px;"/>
</a>
<ul id="nav-mobile" class="right hide-on-med-and-down">';
 
$gambar ='
<li style="margin-right: 70px;"><a onclick="bukamenu()" href="#" class="y">'.$navbarImg2.'</a></li>';

$dua =
'<li><a onclick="bukalogin()" href="#">login</a></li>
<li><a onclick="bukaregis()" class="btn-small" href="#">register</a></li>';

$tiga ='
</ul>
</div>
</nav>';


function navbar($satu,$dua,$jasa,$gambar,$tiga){
    if(isset($_SESSION['uid'])){
        echo $satu;
        echo $jasa;
        echo $gambar;
        echo $tiga;
    }else{
        echo $satu;
        echo $dua;
        echo $tiga;
    }
};

?>