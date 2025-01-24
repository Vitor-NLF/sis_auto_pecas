<?php
require_once '../Controller/ProdutoController.php';

$controller = new ProdutoController();
$produtos = $controller->listar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos e peças</title>
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
    <h1>Produtos e peças Cadastradas</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Estoque</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>
        <?php foreach($produtos as $produto): ?>
            <tr>
                <td><?php echo $produto['id']; ?></td>
                <td><?php echo $produto['nome']; ?></td>
                <td><?php echo $produto['descricao']; ?></td>
                <td><?php echo $produto['estoque']; ?></td>
                <td><?php echo $produto['preco']; ?></td>
                <td>
                    <a href="../View/EditarProduto.php?id=<?php echo $produto['id']; ?>" class="editar" >Editar</a>
                    <a href="../Controller/ProdutoController.php?acao=excluir&id=<?php echo $produto['id']; ?>" class="excluir">Excluir</a>
                </td>
            </tr>
            
        <?php endforeach; ?>
    </table>
    <p>Você deseja cadastrar outro? clique <a href="./CadastrarProduto.php">aqui</a></p>
</body>
</html>
