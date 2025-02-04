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
