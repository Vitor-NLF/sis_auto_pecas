<?php
require_once '../Controller/ServicoController.php';

$controller = new ServicoController();
$servicos = $controller->listar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Serviços</title>
</head>
<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }

        table {
            width: 90%;
            max-width: 1000px;
            border-collapse: collapse;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
            text-transform: uppercase;
        }

        tr:hover {
            background-color: #f1f1f1;
            transition: background 0.3s ease-in-out;
        }

        td a {
            text-decoration: none;
            padding: 4px 18px;
            border-radius: 5px;
            font-size: 0.9em;
            transition: 0.3s;
            display: flex;
            margin: 2px;
        }

        .editar {
            background-color: #28a745;
            color: white;
        }

        .editar:hover {
            background-color: #218838;
        }

        .excluir {
            background-color: #dc3545;
            color: white;
        }

        .excluir:hover {
            background-color: #c82333;
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
        <div class="voltar-inicio">
            <a href="../../index.php">
            <button>Voltar</button>
            </a>
        </div>
        <h1>Lista de serviços</h1>
        <table border="1">
            <tr>
                <th>ID do Serviço</th>
                <th>Cliente</th>
                <th>Serviço</th>
                <th>Descrição</th>
                <th>Início</th>
                <th>Fim</th>
                <th>Valor do Serviço</th>
                <th>Produtos/Peças</th>
                <th>Ações</th>
            </tr>
            <?php foreach($servicos as $servico): ?>
                <tr>
                    <td><?php echo $servico['Id']; ?></td>
                    <td><?php echo $servico['Cliente']; ?></td>
                    <td><?php echo $servico['Servico']; ?></td>
                    <td><?php echo $servico['Sobre']; ?></td>
                    <td><?php echo $servico['Inicio']; ?></td>
                    <td><?php echo $servico['Fim']; ?></td>
                    <td><?php echo $servico['Valor']; ?></td>
                    <td><?php echo $servico['Produto']; ?></td>
                    <td>
                        <a href="../View/EditarServico.php?id=<?php echo $servico['Id']; ?>" class="editar" >Editar</a>
                        <a href="../Controller/ServicoController.php?acao=excluir&id=<?php echo $servico['Id']; ?>" class="excluir">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <p>Deseja cadastrar mais serviços clique <a href="./CadastrarServico.php">aqui</a></p>
</body>
</html>