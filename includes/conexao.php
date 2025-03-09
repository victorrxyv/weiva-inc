<?php

$conn = mysqli_connect("localhost", "root", "", "bd_weiva");

//$conn = mysqli_connect("sql111.infinityfree.com", "if0_38309893", "9sL87vJQ4bZ", "if0_38309893_bd_weiva");

if (!$conn) {
    die("Erro na conexão: " . mysqli_connect_error());
}

?>