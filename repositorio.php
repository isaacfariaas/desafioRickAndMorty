<?php
session_start();
$server = "localhost";
$user = "root";
$password = "";
$dbname = "rickandmorty";

$connect = mysqli_connect($server, $user, $password, $dbname);

if(!$connect){
    $_SESSION['msg'] = "<p style='color:red;'>Conexão falhou!</p>";
    header("Location: index.php");
    return;
}
?>