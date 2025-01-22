<?php
require_once '../Model/Cliente.php';

class ClienteController {
    private $model;

    public function __construct() {
        $this->model = new Cliente();
    }

    public function listar() {
        return $this->model->buscarTodos();
    }

    public function cadastrar($nome, $cpf, $email) {
        return $this->model->cadastrar($nome, $cpf, $email);
    }

    public function excluir($id) {
        return $this->model->excluir($id);
    }

    
}
?>
