<?php
include_once('repositorio.php');
if (isset($_SESSION['alerta'])) {
    echo $_SESSION['alerta'];
    unset($_SESSION['alerta']);
}
$uploadFile = "";
$nome = "";
$especie = "";
$sexo = "";
$status = "";
$uploadImg = "";

//Inicio da Recuperação

if (isset($_GET["codigo"])) {

    $where = " WHERE (0=0) ";
    $codigo = $_GET["codigo"];

    $query = "SELECT * FROM personagens WHERE codigo=$codigo";
    $result = mysqli_query($connect, $query);


    while ($row = mysqli_fetch_assoc($result)) {
        $codigo = $row['codigo'];
        $uploadFile = $row['uploadFile'];
        $nome =   $row['nome'];
        $especie = $row['especie'];
        $sexo = $row['sexo'];
        $status = $row['status'];
        $uploadImg = "<img class=" . 'avatar' . " src=" . '"' . 'uploadFiles/' . $uploadFile . '"' . " height=" . '200' . " width=" . '200' . ">";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Creepster&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <title>Cadastro Teste</title>
</head>

<body>
    <h1>Cadastro de Personagem</h1>
    <form method="POST" enctype="multipart/form-data" action="processa.php">
        <input type="hidden" name="codigo" value="<?php echo $codigo; ?>" />


        <p><?php echo $uploadImg; ?></p>


        <label for="nome">Nome</label><br>
        <input type="text" name="nome" placeholder="Digite o seu nome" required autocomplete="off" value="<?php echo $nome ?>" class="padrao" id="nome"><br>


        <label for="status">Status</label><br>
        <select name="status" id="status" class="padrao status">
            <option value="">Selecione</option>
            <option value="vivo" <?= ($status == 'vivo') ? 'selected' : '' ?>>Vivo</option>
            <option value="morto" <?= ($status == 'morto') ? 'selected' : '' ?>>Morto</option>
            <option value="desconhecido" <?= ($status == 'desconhecido') ? 'selected' : '' ?>>Desconhecido</option>
        </select><br>


        <label for="especie">Espécie</label><br>
        <input type="text" name="especie" placeholder="Digite o sua espécie" value="<?php echo $especie ?>" autocomplete="off" required class="padrao" id="especie"><br>


        <label for="sexo">Gênero Sexual</label><br>
        <select name="sexo" id="sexo" class="padrao sexo">
            <option value="">Selecione</option>
            <option value="masculino" <?= ($sexo == 'masculino') ? 'selected' : '' ?>>Masculino</option>
            <option value="feminino" <?= ($sexo == 'feminino') ? 'selected' : '' ?>>Feminino</option>
            <option value="outro" <?= ($sexo == 'outro') ? 'selected' : '' ?>>Outro</option>
        </select><br></br>
        Carregue uma imagem do personagem
        <input type="file" name="uploadFile" value="<?php echo $uploadFile; ?>"><br></br>

        <button type="submit" class="btnGravar">Gravar</button>
        <button type="button" class="btnFiltro">Filtro</button>
    </form>

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <script>
        fetch('https://rickandmortyapi.com/api/character', )
            .then(response => response.json())
            .then(json => console.log(json))
    </script>

</body>

</html>