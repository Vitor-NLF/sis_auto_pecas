<?php
require_once '../Controller/ClienteController.php';

$controller = new ClienteController();
$clientes = $controller->listar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
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
    <h1>Clientes Cadastrados</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php foreach($clientes as $cliente): ?>
            <tr>
                <td><?php echo $cliente['id']; ?></td>
                <td><?php echo $cliente['nome']; ?></td>
                <td><?php echo $cliente['cpf']; ?></td>
                <td><?php echo $cliente['email']; ?></td>
                <td>
                    <a href="../View/EditarCliente.php?id=<?php echo $cliente['id']; ?>" class="editar" >Editar</a>
                    <a href="../Controller/ClienteController.php?acao=excluir&id=<?php echo $cliente['id']; ?>" class="excluir">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php foreach($clientes as $cliente): ?>
            <tr>
                <td><?php echo $cliente['id']; ?></td>
                <td><?php echo $cliente['nome']; ?></td>
                <td><?php echo $cliente['cpf']; ?></td>
                <td><?php echo $cliente['email']; ?></td>
                <td>
                    <a href="../View/EditarCliente.php?id=<?php echo $cliente['id']; ?>" class="editar" >Editar</a>
                    <a href="../Controller/ClienteController.php?acao=excluir&id=<?php echo $cliente['id']; ?>" class="excluir">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    
    <p>Você deseja cadastrar outro? clique <a href="./CadastrarCliente.php">aqui</a></p>
</body>
</html>
