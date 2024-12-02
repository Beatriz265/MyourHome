<?php
// Inclui a conexão com o banco de dados
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nova_senha = $_POST['nova_senha'];
    $confirmar_senha = $_POST['confirmar_senha'];
    $usuario_id = $_POST['email']; // Isso deve ser o ID do usuário, não o email

    // Verificar se as senhas coincidem
    if ($nova_senha === $confirmar_senha) {
        // Hash da nova senha
        $hashed_senha = password_hash($nova_senha, PASSWORD_DEFAULT);

        // Atualiza a senha no banco de dados
        $sql = "UPDATE usuarios SET senha = :senha WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':senha', $hashed_senha);
        $stmt->bindParam(':id', $usuario_id);

        if ($stmt->execute()) {
            echo "Senha redefinida com sucesso!";
        } else {
            echo "Erro ao redefinir a senha. Tente novamente.";
        }
    } else {
        echo "As senhas não coincidem. Tente novamente.";
    }
} else {
    // Redireciona para a página de login se o acesso não for via POST
    header("Location: index.php"); // Corrigido para usar "Location"
    exit;
}