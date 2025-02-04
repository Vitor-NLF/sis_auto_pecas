<?php
require_once '../Controller/ServicoController.php';

// Verifica se o formulário foi enviado
if (isset($_POST['cadastrar'])) {
    $titulo_serv = $_POST['titulo'];
    $id_cliente = $_POST['id_cliente'];
    $descricao = $_POST['descricao'];
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];
    $valor_serv = $_POST['valor'];
    $id_produto = $_POST['id_produto'];

    $controller = new ServicoController();
    $resultado = $controller->cadastrar($titulo_serv, $id_cliente, $descricao, $data_inicio, $data_fim, $valor_serv, $id_produto);

    if ($resultado) {
        echo '<script>alert("Serviço cadastrado com sucesso!");</script>';
        // echo "<meta http-equiv='refresh' content='0.5;url=listar_clientes.php'>";
    } else {
        echo '<script>alert("Erro ao cadastrar serviço! Tente novamente.");</script>';
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
         body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }

        form {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        input[type="submit"] {
            width: 100%; 
            padding: 10px;  
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px; 
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 18px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        input[type="submit"]:active {
            background-color: #3e8e41;
        }
        .voltar-inicio{
            display: flex;
            align-items: center;
        }
        .voltar-inicio button{
            cursor: pointer;
            width: 50px;
            height: 20px;
        }
    </style>
</head>
<body>
    <div class="voltar-inicio">
        <a href="../../index.php">
            <button>Voltar</button>
        </a>
    </div>
    <h1>Cadastro de Serviços</h1>
    <form method="POST">
        <input type="text" name="titulo" placeholder="insira um titulo">
        <input type="number" name="id_cliente" placeholder="insira o id do cliente">
        <input type="text" name="descricao" placeholder="insira a descricao">
        <p>inicio</p>
        <input type="date" name="data_inicio" placeholder="insira a data de inicio">
        <p>fim</p>
        <input type="date" name="data_fim" placeholder="insira a data de fim">
        <input type="text" name="valor" placeholder="insira o valor">
        <input type="number" name="id_produto" placeholder="insira o id do produto que vai usar">
        <input type="submit" name="cadastrar" value="Cadastrar">
    </form>
    <p>Deseja listar os Serviços já cadastrados clique <a href="./ListarServicos.php">aqui</a></p>
</body>
</html>