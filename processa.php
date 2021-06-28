<?php
include_once('repositorio.php');
$id = (int)$_POST['codigo'];
$nome = "'" . $_POST['nome'] . "'";
$status = "'" . $_POST['status'] . "'";
$especie = "'" . $_POST['especie'] . "'";
$sexo = "'" . $_POST['sexo'] . "'";

//Inicio da verificação de Upload
$uploadFile = $_FILES['uploadFile'];
$nameFile = $uploadFile['name'];
$pasta =  'uploadFiles/';
$tamanho = 10000000;

//Verifica tamanho de Upload
if ($tamanho < $_FILES['uploadFile']['size']) {

    $_SESSION['alerta'] = "
    <script type=\"text/javascript\">
    alert(\"O arquivo ultrapassa o limite de 10Mb.\")
    </script>";
    header("Location: index.php");
    return;
}
//Fim da verificação de Upload
//Gravação
echo $especie, $status;
if ($especie=="'Humanoid'"&&$status=="''") {
    header("Location: index.php");
    return;
}
if ($uploadFile['error'] > 1) {

    if ($id != 0) {
        $sql = "UPDATE personagens SET nome=$nome, status=$status, especie=$especie, sexo=$sexo WHERE codigo = $id";
    } else {
        $sql = "INSERT INTO personagens (nome, status, especie, sexo, uploadFile, dataCadastro) VALUES ($nome,$status,$especie,$sexo, '' , NOW())";
    }
    $result = mysqli_query($connect, $sql);
} else {
    move_uploaded_file($uploadFile['tmp_name'], $pasta . $nameFile);
    if ($id != 0) {
        $sql = "UPDATE personagens SET nome=$nome, status=$status, especie=$especie, sexo=$sexo, uploadFile='$nameFile' WHERE codigo = $id";
        echo $sql;
    } else {
        $sql = "INSERT INTO personagens (nome, status, especie, sexo, uploadFile, dataCadastro) VALUES ($nome,$status,$especie,$sexo, '$nameFile' , NOW())";
    }
    $result = mysqli_query($connect, $sql);
}
// Fim da gravação
//Mensagem
$_SESSION['alerta'] = "
<script type=\"text/javascript\">
alert(\"Personagem Cadastrado com sucesso!\")
</script>";
header("Location: index.php");
