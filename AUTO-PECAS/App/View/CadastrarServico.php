<?php
require_once '../Controller/ServicoController.php';

// Verifica se o formulário foi enviado
if (isset($_POST['cadastrar'])) {
    $titulo_serv = $_POST['titulo'];
    $id_cliente = $_POST['id_cliente'];
    $descricao = $_POST['descricao'];
    $duracao_dias = $_POST['duracao'];
    $valor_serv = $_POST['valor'];

    $controller = new ServicoController();
    $resultado = $controller->cadastrar($titulo_serv, $id_cliente, $descricao, $duracao_dias, $valor_serv);

    if ($resultado) {
        echo '<script>alert("Cliente cadastrado com sucesso!");</script>';
        // echo "<meta http-equiv='refresh' content='0.5;url=listar_clientes.php'>";
    } else {
        echo '<script>alert("Erro ao cadastrar cliente! Tente novamente.");</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Serviços</title>
    <style>

    </style>
</head>
<body>
    <p class="voltar-inicio">Voltar ao <a href="../../index.php">inicio</a></p>
    <h1>Cadastro de Serviços</h1>
    <form method="POST">
        <input type="text" name="titulo" placeholder="insira um titulo">
        <input type="number" name="id_cliente" placeholder="insira o id do cliente">
        <input type="text" name="descricao" placeholder="insira a descricao">
        <input type="text" name="duracao" placeholder="insira a duracao (dias)">
        <input type="text" name="valor" placeholder="insira o valor">
        <input type="submit" name="cadastrar" value="Cadastrar">
    </form>
    <p>Deseja listar os Serviços já cadastrados clique <a href="./ListarServicos.php">aqui</a></p>
</body>
</html>