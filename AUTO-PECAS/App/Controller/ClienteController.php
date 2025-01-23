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
        return $this->model->buscarTodos();
    }

    
    public static function buscar_by_id($id) {
        return (new Cliente('clientes'))->buscarPorId('id= '.$id)->fetchObject(self::class);    
    }    
    

    public function cadastrar($nome, $cpf, $email) {
        return $this->model->cadastrar($nome, $cpf, $email);
    }
    
    public function update($id, $nome, $cpf, $email){
        return $this->model->atualizar($id, $nome, $cpf, $email);
    }

    public function excluir($id) {
        $this->model->excluir($id);
        header("Location: ../View/ListarClientes.php"); // Redireciona após a exclusão
        exit();
    }
}

// Verificar a ação a ser executada
if (isset($_GET['acao'])) {
    $acao = $_GET['acao'];
    $clienteController = new ClienteController();
    
    if ($acao == 'excluir' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $clienteController->excluir($id);
    }
}
?>
