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

require '../Model/Cliente.php';

class ClienteController {
    private $model;

    public function __construct() {
        $this->model = new Cliente();   
    }

    public function listar() {
        return $this->model->select();
    }

    
    public static function buscar_por_id($id) {
        $cliente = new Cliente();
        return $cliente->searchForID($id);  
    }    
    

    public function cadastrar($nome, $cpf, $email) {
        return $this->model->insert($nome, $cpf, $email);
    }
    
    public function atualizar($id, $nome, $cpf, $email){
        return $this->model->update($id, $nome, $cpf, $email);
    }

    public function excluir($id) {
        $this->model->delete($id);
        header("Location: ../View/ListarClientes.php");
        exit(); 
        
    }
}

// Verificar a ação "EXCLUIR" a ser executada
if (isset($_GET['acao'])) {
    $acao = $_GET['acao'];
    $clienteController = new ClienteController();
    
    if ($acao == 'excluir' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $clienteController->excluir($id);
        echo "<script>excluido com sucesso!! </script>" ;
    }
}
?>
