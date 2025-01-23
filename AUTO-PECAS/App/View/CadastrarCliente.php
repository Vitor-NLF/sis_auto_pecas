<?php
require_once '../Controller/ClienteController.php';

// Verifica se o formulário foi enviado
if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];

    $controller = new ClienteController();
    $resultado = $controller->cadastrar($nome, $cpf, $email);

    if ($resultado) {
        echo '<script>alert("Cliente cadastrado com sucesso!");</script>';
        header("location: ./ListarClientes.php");
        // echo "<meta http-equiv='refresh' content='0.5;url=listar_clientes.php'>";
    } else {
        echo '<script>alert("Erro ao cadastrar cliente! Tente novamente.");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cliente</title>
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
</head>
<body>
    <h1>Cadastrar Cliente</h1>

    <form method="POST">
        <input type="text" name="nome" placeholder="Nome do Cliente" required>
        <input type="text" name="cpf" placeholder="CPF sem pontos e traços" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="submit" name="cadastrar" value="Cadastrar">
    </form>
</body>
</html>
