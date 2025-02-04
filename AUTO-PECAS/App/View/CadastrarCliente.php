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
            width: 300px; 
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;  
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #4CAF50; 
            color: white;
            border: none;
            cursor: pointer;
            font-size: 18px;
        }

        input[type="submit"]:hover {
            background-color: #45a049; 
        }

        input[type="submit"]:active {
            background-color: #3e8e41; 
        }
        .voltar-inicio{
            display: flex;
            align-items: center;
        }
        .voltar-inicio button{
            cursor: pointer;
            width: 50px;
            height: 20px;
        } 
    </style>
</head>
<body>
    <div class="voltar-inicio">
        <a href="../../index.php">
            <button>Voltar</button>
        </a>
    </div>
    <h1>Cadastrar Cliente</h1>

    <form method="POST">
        <input type="text" name="nome" placeholder="Nome do Cliente" required>
        <input type="text" name="cpf" placeholder="CPF sem pontos e traços" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="submit" name="cadastrar" value="Cadastrar">
    </form>
    <p>Deseja listar os Clientes já cadastrados clique <a href="./ListarClientes.php">aqui</a></p>
</body>
</html>
