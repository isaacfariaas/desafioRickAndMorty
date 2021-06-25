<?php
include_once('repositorio.php');

$nome = "'" . $_POST['nome'] . "'";
$status = "'" . $_POST['status'] . "'";
$especie = "'" . $_POST['especie'] . "'";
$sexo = "'" . $_POST['sexo'] . "'";

//inicio upload
$uploadFile = $_FILES['uploadFile'];
$pasta =  'uploadFiles/';
$tamanho = 1024 * 1024 * 100 + 1024 * 1024 * 100;

  
//Verifica se o arquivo é muito grande
if ($tamanho < $_FILES['uploadFile']['size']) {

    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost:82/desafioCeleritech/index.php>
    <script type=\"text/javascript\">
    alert(\"O arquivo ultrapassa o limite de 10Mb.\")
    </script>";
    die('verificação falhou');
}
//fim upload

if (move_uploaded_file($uploadFile['tmp_name'], $pasta . $uploadFile['name'])) {
    //Upload efetuado com sucesso, exibe a mensagem
    $sql = "INSERT INTO personagens (nome, status, especie, sexo, uploadFile, dataCadastro) VALUES ($nome,$status,$especie,$sexo,".$uploadFile['name'].", NOW())";
    $result = mysqli_query($connect, $sql);

    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost:82/desafioCeleritech/index.php>
    <script type=\"text/javascript\">
    alert(\"Personagem Cadastrado com sucesso!.\")
    </script>";
} else {
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost:82/desafioCeleritech/index.php>
    <script type=\"text/javascript\">
    alert(\"Personagem não cadastrado.\")
    </script>";
}





   










// $ret = 'sucess#';
// if ($result < 1) {
//     $ret = 'failed#';
// }
// echo $ret;
