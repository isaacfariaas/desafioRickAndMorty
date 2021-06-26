<?php session_start(); 
 if (isset($_SESSION['alerta'])) {
        echo $_SESSION['alerta'];
        unset($_SESSION['alerta']);
    } ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Teste</title>
</head>

<body>
    <h1>Cadastrar de Personagem</h1>
    <form method="POST" enctype="multipart/form-data" action="processa.php">
        Carregue uma imagem do personagem
        <input type="file" name="uploadFile"><br></br>

        <label for="nome">Nome:</label><br>
        <input type="text" name="nome" placeholder="Digite o seu nome" required autocomplete="off" class="nome" id="nome"><br></br>

        <label for="status">Status:</label><br>
        <select name="status" id="status">
            <option value="">Selecione</option>
            <option value="vivo">Vivo</option>
            <option value="morto">Morto</option>
            <option value="desconhecido">Desconhecido</option>
        </select><br></br>

        <label for="especie">Espécie:</label><br>
        <input type="text" name="especie" placeholder="Digite o sua espécie" autocomplete="off" required class="especie" id="especie"><br></br>

        <label for="sexo">Gênero Sexual:</label><br>
        <select name="sexo" id="sexo">
            <option value="">Selecione</option>
            <option value="masculino">Masculino</option>
            <option value="feminino">Feminino</option>
            <option value="outro">Outro</option>
        </select><br></br>

        <button type="submit">Enviar</button>

    </form>

</body>

</html>

