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
}