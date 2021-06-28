<?php include_once('repositorio.php');
if (isset($_SESSION['alerta'])) {
    echo $_SESSION['alerta'];
    unset($_SESSION['alerta']);
}

$parametrosTh = "";
$uploadFile = "";
$nome = "";
$especie = "";
$sexo = "";
$status = "";
$deletar = "";
$parametrosBusca = "";

//Início da busca

if (isset($_GET["pesquisar"])) {

    $where = " WHERE (0=0) ";
    $nome = $_GET["nome"];
    $especie =  $_GET["especie"];

    if ($nome != "") {

        $where = $where . " AND nome = " . "'" .  $nome . "'";
    }
    if ($especie !== "") {

        $where = $where . " AND especie = " . "'" .  $especie . "'";
    }

    $query = "SELECT * FROM personagens";
    $query = $query . $where;

    $result = mysqli_query($connect, $query);

    $parametrosTh = "<th>Foto</th>
                    <th>Nome</th>
                    <th>Espécie</th>
                    <th>Gênero</th>
                    <th>Status</th>";

    $parametrosBusca = "<th><input placeholder=".'"'.'busque um nome'.'"'." type=" .'"' . "text" .'"' . " id=" .'"' . "nomeBusca" .'"' . "/></th>";
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

    <title>Filtro Teste</title>
</head>

<body>
    <h1>Filtro de Personagem</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label for="nome">Nome</label><br>
            <input type="text" name="nome" placeholder="Digite o nome" autocomplete="off" class="padrao" id="nome"><br></br>
        </div>

        <div class="form-group">
            <label for="especie">Espécie</label><br>
            <input type="text" name="especie" placeholder="Digite o sua espécie" autocomplete="off" class="padrao" id="especie"><br></br>
        </div>

        <input type="submit" name="pesquisar" value="Pesquisar" class="btnPesquisar" />
        <a class="btnCadastrar" href="index.php" style="text-decoration: none; color: white;">Cadastro</a>

        <table id="tabela">
            <thead>
                <tr>
                    <?php echo $parametrosBusca; ?>
                </tr>
                <tr>
                    <?php echo $parametrosTh; ?>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET["pesquisar"])) {
                    foreach ($result as $row) {
                        echo '<tr>';
                        echo '<td><img class="avatar" src=' . '"uploadFiles/' . $row['uploadFile'] . '"' . 'height=' . '50 ' .  'width=' . '50' .  '></td>';
                        echo '<td><a class="btnNome" href="index.php?codigo=' . $row['codigo'] . '">' . $row['nome'] . '</a></td>';
                        echo '<td class="text-left">' . $row['especie'] . '</td>';
                        echo '<td class="text-left">' . $row['sexo'] . '</td>';
                        echo '<td class="text-left">' . $row['status'] . '</td>';
                        echo '<td><a class="btnDelete" href="delete.php?codigo=' . $row['codigo'] . '">Deletar</a></td>';
                        echo '</tr>';
                    }
                }
                ?>
            </tbody>
            <hr>
        </table>


    </form>

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>