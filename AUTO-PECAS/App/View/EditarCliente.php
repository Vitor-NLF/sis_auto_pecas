<?php
require_once '../Controller/ClienteController.php';

$id_recebido = $_GET['id'];

if (!isset($id_recebido) or !is_numeric($id_recebido)) {
    header('location: listatClientes.php');
    exit;
}

// $cliente = ClienteController::buscar_by_id($id_recebido);


// $nome = $cliente->nome;
// $cpf = $cliente->cpf;
// $email = $cliente->email;

if (isset($_POST['editar'])) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];

    $cliente = new ClienteController();
    $result = $cliente->update($id_recebido, $nome, $cpf, $email);

    if ($result) {
        echo "Cliente atualizado com sucesso!";
        header('Location: ./listarClientes.php'); // Redireciona após atualizar
        exit();
    } else {
        echo "Erro ao atualizar o cliente.";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    </style>
    <h1>Editar Cadastro</h1>

    <form method="POST">
        <input name= "nome" id= "nome" type="text" value =""placeholder="Insira o novo nome">
        <input name= "cpf" id= "cpf" type="text" value ="" placeholder="Insira o novo CPF">
        <input name= "email" id= "email" type="email" value = "" placeholder="Insira o novo email">
        <input name="editar" type="Submit" value ="Editar">
    </form>
</body>
</html>