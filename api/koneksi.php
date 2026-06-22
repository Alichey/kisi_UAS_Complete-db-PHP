<?php

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");

    $host='localhost';
    $user='root';
    $pass='';
    $db='inventarisweb';
    $port=3306;

    $conn=mysqli_connect($host,$user,$pass,$db,$port);

    if(mysqli_connect_errno()){
        //echo 'error';
    }else{
        //echo 'berhasil';
    }

?>