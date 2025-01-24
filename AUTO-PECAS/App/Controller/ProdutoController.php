<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php

require_once "../Model/Produto.php";

class ProdutoController{

    private $model;

    public function __construct(){
        return $this->model = new Produto();
    }

    public function cadastrar($nome, $descricao, $estoque, $preco){
        return $this->model->insert($nome, $descricao, $estoque, $preco);
    }

    public function listar(){
        return $this->model->select();
    }

    public static function buscar_por_id($id) {
        $produto = new Produto();
        return $produto->searchForID($id);  
    }    
    

    public function excluir($id){
        return $this->model->delete($id);
        exit();
    }

    public function atualizar($id, $nome, $descricao, $estoque, $preco){
        return $this->model->update($id, $nome, $descricao, $estoque, $preco);
    }

}


if (isset($_GET['acao'])) {
    $acao = $_GET['acao'];
    $produtoController = new ProdutoController();
    
    if ($acao == 'excluir' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $produtoController->excluir($id);
        header("Location: ../View/ListarProdutos.php");
        echo "<script>excluido com sucesso!! </script>" ;
    }
}
