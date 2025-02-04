<?php
require_once '../Controller/ProdutoController.php';

$id_recebido = ($_GET['id']);

if (!isset($id_recebido) or !is_numeric($id_recebido)) {
    header('location: ListarProdutos.php');
    exit;
}

$novo_produto = new ProdutoController();
$produto = $novo_produto->buscar_por_id($id_recebido);


$nome = $produto->nome;
$descricao = $produto->descricao;
$estoque = $produto->estoque;
$preco = $produto->preco;

// Exibe as informações (apenas um exemplo, você pode usar essas variáveis como quiser)


if (isset($_POST['editar'])) {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $estoque = $_POST['estoque'];
    $preco = $_POST['preco'];

    $produto = new ProdutoController();
    $result = $produto->atualizar($id_recebido, $nome, $descricao, $estoque, $preco);

    if ($result) {
        echo "Atualizado com sucesso!";
        header('Location: ./ListarProdutos.php'); // Redireciona após atualizar
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
    <title>Editar Produtos e peças</title>
</head>
<body>
    <style>
        body{
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
            display: flex;
            justify-content: center;
            flex-direction:column;
            align-items: center;
        }
        form{
            border: 2px solid black;
            border-radius: 10px;
            /* width: 30%; */
            display: flex;
            justify-content: center;
            flex-direction: column;
            padding:30px;
        }
        input[type="text"], input[type="email"], input[type="submit"] {
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
        }

        input[type="submit"]:hover {
            background-color: rgb(90, 173, 211);
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
    <h1>Editar Produto</h1>

    <form method="POST">
        <h1 class="title">Edite abaixo os novos dados</h1>
        <input name= "nome" id= "nome" type="text" value ="<?php echo $nome ?>" placeholder="novo nome">
        <input name= "descricao" id= "descricao" type="text" value ="<?php echo $descricao ?>" placeholder="nova descrição">
        <input name= "estoque" id= "estoque" type="number" value ="<?php echo $estoque ?>" placeholder="novo estoque">
        <input name= "preco" id= "preco" type="text" value = "<?php echo $preco ?>" placeholder="novo preço">
        <input name="editar" type="Submit" value ="Editar">
    </form>
</body>
</html>