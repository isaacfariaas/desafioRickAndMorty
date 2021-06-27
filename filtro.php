<?php include_once('repositorio.php');
if (isset($_SESSION['alerta'])) {
    echo $_SESSION['alerta'];
    unset($_SESSION['alerta']);
}

$parametrosTh = '';
$uploadFile = "";
$nome = "";
$especie = "";
$sexo = "";
$status = "";
$deletar = '';
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


    foreach ($result as $row) {
        $codigo = $row['codigo'];
        $uploadFile = '"uploadFiles/' . $row['uploadFile'] . '"';

        $uploadFile = "<tr><td><img src=" . $uploadFile . "height=" . '50' . " width=" . '50' . "></td>";

        $nome ="<td>" . "<a href=" . '"' . "index.php?codigo=" . $codigo . '"' . ">" . $row['nome']. "</td>";
        $especie = "<td>" . $row['especie'] . "</td>";
        $sexo = "<td>" .  $row['sexo'] . "</td>";
        $status = "<td>" . $row['status'] . "</td>";
        $deletar = '<td><a href="delete.php?codigo=' . $codigo . '">Deletar</a></td></tr>';
        $parametrosTr = $uploadFile . $nome . $especie . $sexo . $status;
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtro Teste</title>
</head>

<body>
    <h1>Filtro de Personagem</h1>
    <p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>">

        <label for="nome">Nome:</label><br>
        <input type="text" name="nome" placeholder="Digite o nome" autocomplete="off" class="nome" id="nome"><br></br>

        <label for="especie">Espécie:</label><br>
        <input type="text" name="especie" placeholder="Digite o sua espécie" autocomplete="off" class="especie" id="especie"><br></br>

        <input type="submit" name="pesquisar" value="Pesquisar" />
        <button><a href="index.php">Cadastrar</a></button><br></br>

        <table class="tabelaFiltro">
            <thead>
                <tr>
                    <th style="min-width:30px;">Foto</th>
                    <th style="min-width:30px;">Nome</th>
                    <th style="min-width:30px;">Espécie</th>
                    <th style="min-width:30px;">Gênero</th>
                    <th style="min-width:30px;">Status</th>
                </tr>
            </thead>
            <?php echo $uploadFile;?>
            <?php echo $nome;?>
            <?php echo$especie;?>
            <?php echo$sexo;?>
            <?php echo$status;?>
            <?php echo$deletar;?>
        </table>
        <hr>

    </form>
    </p>

</body>

</html>