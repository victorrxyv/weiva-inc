<?php
$conn = mysqli_connect("localhost", "root", "", "bd_weiva");

if (!$conn) {
    die("Erro na conexão: " . mysqli_connect_error());
}
?>