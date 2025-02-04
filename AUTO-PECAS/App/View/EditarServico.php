<?php
require_once '../Controller/ServicoController.php';

$id_recebido = ($_GET['id']);

if (!isset($id_recebido) or !is_numeric($id_recebido)) {
    header('location: ListarServicos.php');
    exit;
}

$novo_servico = new ServicoController();
$servico = $novo_servico->buscar_por_id($id_recebido);

$titulo_serv = $servico->Servico;
$id_cliente = $servico->id_cliente;
$descricao = $servico->Sobre;
$data_inicio = $servico->Inicio;
$data_fim = $servico->Fim;
$valor_serv = $servico->Valor;
$id_produto = $servico->id_produto;

// Exibe as informações (apenas um exemplo, você pode usar essas variáveis como quiser)


if (isset($_POST['editar'])) {
    $titulo_serv = $_POST['titulo_serv'];
    $id_cliente = $_POST['id_cliente'];
    $descricao = $_POST['descricao'];
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];
    $valor_serv = $_POST['valor_serv'];
    $id_produto = $_POST['id_produto'];

    $servico = new ServicoController();
    $result = $servico->atualizar($id_recebido, $titulo_serv, $id_cliente, $descricao, $data_inicio, $data_fim, $valor_serv, $id_produto);

    if ($result) {
        echo "Atualizado com sucesso!";
        header('Location: ./ListarServicos.php');
        exit();
    } else {
        echo "Erro ao atualizar.";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Serviços</title>
</head>
<body>
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

        p {
            margin: 10px 0 5px 0;
            font-size: 14px;
            font-weight: bold;
            color: #555;
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
        .title{
            font-size: 16px;
        }
        .voltar-inicio button{
            cursor: pointer;
            width: 50px;
            height: 20px;
        }
    </style>
        <div class="voltar-inicio">
            <a href="../../index.php">
                <button>Voltar</button>
            </a>
        </div>
    <h1>Editar Serviço</h1>

    <form method="POST">
        <h1 class="title">Edite abaixo os novos dados</h1>
        <input name= "titulo_serv" id= "titulo_serv" type="text" value ="<?php echo $titulo_serv ?>" placeholder="novo titulo">
        <input name= "id_cliente" id= "id_cliente" type="text" value ="<?php echo $id_cliente ?>" placeholder="novo id do cliente">
        <input name= "descricao" id= "descricao" type="text" value ="<?php echo $descricao ?>" placeholder="nova descrição">
        <input name= "data_inicio" id= "data_inicio" type="date" value = "<?php echo $data_inicio ?>" placeholder="">
        <input name= "data_fim" id= "data_fim" type="date" value = "<?php echo $data_fim ?>" placeholder="">
        <input name= "valor_serv" id= "valor_serv" type="text" value = "<?php echo $valor_serv ?>" placeholder="novo valor">
        <input name= "id_produto" id= "id_produto" type="text" value = "<?php echo $id_produto ?>" placeholder="novo id do produto">
        <input name="editar" type="Submit" value ="Editar">
    </form>
</body>
</html>