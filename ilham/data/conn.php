<?php

$conn = mysqli_connect("localhost","root","","ilham");

if (mysqli_connect_errno()){
    echo "DATABASE ERROR HUEHEHEHE :" . mysqli_connect_error();
}

session_start();

?>