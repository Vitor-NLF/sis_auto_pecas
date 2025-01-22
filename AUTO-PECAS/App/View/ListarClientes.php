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
                    <a href="../Controller/ClienteController/editar?id=<?php echo $cliente['id']; ?>">Editar</a>
                    <a href="../Controller/ClienteController.php/excluir?id=<?php echo $cliente['id']; ?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
