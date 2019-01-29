<?php

$sidenavMaterial1 = '<ul class="sidenav sidenav-fixed"><li class="logo"><a href="#" class="brand-logo center usr-pic">';
$sidenavMaterial2 = '</a></li><li class="bold"><p class="side-p waves-effect waves-teal">';
$sidenavMaterial3 = '</p>
</li>
<li><div class="divider"></div></li>
<li class="bold"><a href="">Kategori</a>
    <div class="collapsible-body" style="display: block;">
        <ul>
            <li><a href="">Sketsa</a></li>
            <li><a href="">Grafis</a></li>
            <li><a href="">Lukis</a></li>
            <li><a href="">Ukir</a></li>
            <li><a href="">Pahat</a></li>
            <li><a href="">Sastra</a></li>
            <li><a href="">Musik</a></li>
            <li><a href="">Tari</a></li>
        </ul>
    </div>
</li>
</ul>';

$sidenav = $sidenavMaterial1.$sideNavImg.$sidenavMaterial2.@$rows['nama'].$sidenavMaterial3;

$sidenav2 = '
    <ul class="sidenav sidenav-fixed">
        <li class="logo">
            <a href="#" class="brand-logo center usr-pic">
                '.$sideNavImg2.'
            </a>
        </li>
        <li class="bold">
            <p class="side-p waves-effect waves-teal">'.@$rows['nama'].'</p>
        </li>
        <li><div class="divider"></div></li>
        <li class="bold"><a href="">Kategori</a>
            <div class="collapsible-body" style="display: block;">
                <ul>
                    <li><a href="">Sketsa</a></li>
                    <li><a href="">Grafis</a></li>
                    <li><a href="">Lukis</a></li>
                    <li><a href="">Ukir</a></li>
                    <li><a href="">Pahat</a></li>
                    <li><a href="">Sastra</a></li>
                    <li><a href="">Musik</a></li>
                    <li><a href="">Tari</a></li>
                </ul>
            </div>
        </li>
    </ul>
';


$sidenav3 = '
    <ul class="sidenav sidenav-fixed">
        <li class="logo">
            <a href="#" class="brand-logo center usr-pic">
                '.$sideNavImg3.'
            </a>
        </li>
        <li class="bold">
            <p class="side-p waves-effect waves-teal">'.@$rows['nama'].'</p>
        </li>
        <li><div class="divider"></div></li>
        <li class="bold"><a href="">Kategori</a>
            <div class="collapsible-body" style="display: block;">
                <ul>
                    <li><a href="">Sketsa</a></li>
                    <li><a href="">Grafis</a></li>
                    <li><a href="">Lukis</a></li>
                    <li><a href="">Ukir</a></li>
                    <li><a href="">Pahat</a></li>
                    <li><a href="">Sastra</a></li>
                    <li><a href="">Musik</a></li>
                    <li><a href="">Tari</a></li>
                </ul>
            </div>
        </li>
    </ul>
';

?>