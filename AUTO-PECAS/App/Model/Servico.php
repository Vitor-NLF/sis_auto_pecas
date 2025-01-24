<?php

require_once '../../DB/database.php';


class Servico{
    private $conn;

    public function __construct(){
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function select(){
        $query = "SELECT clientes.nome AS Cliente, servicos.titulo_serv AS Servico, servicos.descricao AS Sobre FROM clientes 
        JOIN servicos ON clientes.id = servicos.id_cliente";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->FetchAll(PDO::FETCH_ASSOC);
    }
}