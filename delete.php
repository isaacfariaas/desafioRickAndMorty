<?php
include_once('repositorio.php');
$id = $_GET['codigo'];


if ($id) {
    $sql = "DELETE FROM personagens WHERE codigo = $id";
    $result = mysqli_query($connect, $sql);

    $_SESSION['alerta'] = "
<script type=\"text/javascript\">
alert(\"Personagem Deletado com sucesso!\")
</script>";
    header("Location: filtro.php");
  
} else {

    $_SESSION['alerta'] = "
<script type=\"text/javascript\">
alert(\"Selecione um arquivo para deletar!\")
</script>";
    header("Location: filtro.php");
    return;
}
//Fim da gravação
