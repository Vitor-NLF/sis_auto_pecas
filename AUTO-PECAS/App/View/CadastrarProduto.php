<?php
require_once "../Controller/ProdutoController.php";

if(isset($_POST['cadastrar'])){
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $estoque = $_POST['estoque'];
    $preco = $_POST['preco'];

    $controller = new ProdutoController();
    $resultado = $controller->cadastrar($nome, $descricao, $estoque, $preco);

    if($resultado){
        echo '<script>alert("Cadastrado!!");</script>';
    }else{
        echo '<script>alert("Erro ao cadastrar!!");</script>';
    }
};
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produtos e peças</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }

        form {
            display: inline-block;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            background-color: #f9f9f9;
        }

        input[type="text"], input[type="number"], input[type="text"] input[type="submit"] {
            display: block;
            margin: 10px auto;
            padding: 10px;
            font-size: 20px;
        }

        input[type="submit"] {
            background-color:rgb(90, 173, 211);
            color: white;
            border: none;
            cursor: pointer;
            width: 80px;
            height: 40px;
            border-radius: 10px;
            font-size: 12px;
        }

        input[type="submit"]:hover {
            background-color: rgb(90, 173, 211);
        }   
    </style>
</head>
<body>
<p class="voltar-inicio">Voltar ao <a href="../../index.php">inicio</a></p>
    <h1>Cadastro de produtos e peças</h1>
    <form method ="POST">
        <input type="text" name="nome" placeholder="insira o nome" required>
        <input type="text" name="descricao" placeholder="insira a descricao" required>
        <input type="number" name="estoque" placeholder="insira o estoque" required>
        <input type="text" name="preco" placeholder="insira o valor" required>
        <input type="submit" name="cadastrar" value="Cadastrar">
    </form>
    <p>Deseja listar os Produtos e peças já cadastrados clique <a href="./ListarProdutos.php">aqui</a></p>
</body>
</html>