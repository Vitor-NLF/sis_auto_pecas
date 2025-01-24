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

require_once "../Model/Servico.php";

class ServicoController{
    
    private $model;

    public function __construct(){
        $this->model = new Servico();
    }

    public function listar(){
        return $this->model->select();
    }

    public function cadastrar($titulo_serv, $id_cliente, $descricao, $duracao_dias, $valor_serv){
        return $this->model->insert($titulo_serv, $id_cliente, $descricao, $duracao_dias, $valor_serv);
    }

    public function excluir($id){
        return $this->model->delete($id);
    }

}
if (isset($_GET['acao'])){
    $acao = $_GET['acao'];
    $servicoController = new ServicoController();

    if($acao == 'excluir' && isset($_GET['id'])){
        $id = $_GET['id'];
        $servicoController->excluir($id);
        header("location: ../View/listarServicos.php");
        echo "<script> excluido com sucesso!! </script>" ;
    }

}