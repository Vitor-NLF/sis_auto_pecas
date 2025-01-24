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

        table{
            justify-content: center;
            display: inline-block;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
        }
        .editar{
            text-decoration: none;
            color:rgb(96, 119, 212);
            font-weight: 100;
        }
        .excluir{
            text-decoration: none;
            color:rgb(135, 214, 219);
            font-weight: 100;
        }
    </style>
    <p class="voltar-inicio">Voltar ao <a href="../../index.php">inicio</a></p>
        <h1>Lista de serviços</h1>
        <table border="1">
            <tr>
                <th>ID do Serviço</th>
                <th>Cliente</th>
                <th>Serviço</th>
                <th>Descrição</th>
                <th>Duração (dias)</th>
                <th>Valor do Serviço</th>
                <th>Ações</th>
            </tr>
            <?php foreach($servicos as $servico): ?>
                <tr>
                    <td><?php echo $servico['Id']; ?></td>
                    <td><?php echo $servico['Cliente']; ?></td>
                    <td><?php echo $servico['Servico']; ?></td>
                    <td><?php echo $servico['Sobre']; ?></td>
                    <td><?php echo $servico['Duracao']; ?></td>
                    <td><?php echo $servico['Valor']; ?></td>
                    <td>
                        <!-- <a href="../View/EditarProduto.php?id=<?php echo $servico['id']; ?>" class="editar" >Editar</a> -->
                        <a href="../Controller/ServicoController.php?acao=excluir&id=<?php echo $servico['Id']; ?>" class="excluir">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <p>Deseja cadastrar mais serviços clique <a href="./CadastrarServico.php">aqui</a></p>
</body>
</html>