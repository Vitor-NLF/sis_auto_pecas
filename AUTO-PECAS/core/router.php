<!-- <?php
// require_once '../App/Controller/ClienteController.php';

$acao = $_GET['acao'] ?? null; // Obtém a ação da URL
$id = $_GET['id'] ?? null;     // Obtém o ID da URL (se existir)

$clienteController = new ClienteController();

switch ($acao) {
    case 'listar':
        // Redireciona para a página de listagem
        $clientes = $clienteController->listar();
        require './View/listarClientes.php';
        break;

    case 'excluir':
        if ($id) {
            $resultado = $clienteController->excluir($id);

            if ($resultado) {
                // Redireciona para a listagem após exclusão
                header('Location: ./router.php?acao=listar');
                exit;
            } else {
                echo "Erro ao excluir cliente.";
            }
        } else {
            echo "ID inválido.";
        }
        break;

    default:
        echo "Ação inválida.";
        break;
}
?> -->
