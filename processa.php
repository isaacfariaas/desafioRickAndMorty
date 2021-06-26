<?php
include_once('repositorio.php');

$nome = "'" . $_POST['nome'] . "'";
$status = "'" . $_POST['status'] . "'";
$especie = "'" . $_POST['especie'] . "'";
$sexo = "'" . $_POST['sexo'] . "'";

//Inicio da verificação de Upload
$uploadFile = $_FILES['uploadFile'];
$nameFile = $uploadFile['name'];
$pasta =  'uploadFiles/';
$tamanho = 10000000;

//Verifica tamanho
if ($tamanho < $_FILES['uploadFile']['size']) {

    $_SESSION['alerta'] = "
    <script type=\"text/javascript\">
    alert(\"O arquivo ultrapassa o limite de 10Mb.\")
    </script>";
    header("Location: index.php");
}
//Fim da verificação de Upload
//Gravação
if ($uploadFile['error']>1) {
    print_r($uploadFile);

    $sql = "INSERT INTO personagens (nome, status, especie, sexo, uploadFile, dataCadastro) VALUES ($nome,$status,$especie,$sexo, '' , NOW())";
    $result = mysqli_query($connect, $sql);
} else {

    move_uploaded_file($uploadFile['tmp_name'], $pasta . $nameFile);
    $sql = "INSERT INTO personagens (nome, status, especie, sexo, uploadFile, dataCadastro) VALUES ($nome,$status,$especie,$sexo, '$nameFile' , NOW())";
    $result = mysqli_query($connect, $sql);

}
//Fim da gravação
//Mensagem
$_SESSION['alerta'] = "
<script type=\"text/javascript\">
alert(\"Personagem Cadastrado com sucesso!\")
</script>";
header("Location: index.php");
