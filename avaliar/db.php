<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nova_senha = $_POST['nova_senha'];
    $confirmar_senha = $_POST['confirmar_senha'];

    // Verificar se as senhas coincidem
    if ($nova_senha === $confirmar_senha) {
        // Aqui você deve adicionar a lógica para atualizar a senha no banco de dados
        echo "Senha redefinida com sucesso!";
    } else {
        echo "As senhas não coincidem. Tente novamente.";
    }
} else {
    // Redirecionar para a página de redefinição de senha se o acesso não for via POST
    header("Location: resetarSenha.php");
    exit;
}

$host = "localhost";
$db_name = "myourhome";
$username = "root";
$password = "";


try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro ao conectar: " . $e->getMessage();
}
?>

