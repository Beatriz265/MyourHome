<?php

$token = $_POST["token"] ?? null;
$senha = $_POST["senha"] ?? null;
$senha_confirmar = $_POST["senha_comfirmar"] ?? null;

$token_hash = hash("sha256", $token);


$mysqli = require __DIR__ . "/conection_DB.php";


$sql = "SELECT * FROM usuarios WHERE reset_token_hash = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $token_hash);
$stmt->execute();
$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user === null) {
    die("Token não foi encontrado");
}

if (strtotime($user["expire_token_at"]) <= time()) {
    die("Token expirou");
}


if (strlen($senha) < 8) {
    die("A senha deve ter pelo menos 8 caracteres");
}

if (!preg_match("/[a-z]/i", $senha)) {
    die("A senha deve conter pelo menos uma letra");
}

if (!preg_match("/[0-9]/", $senha)) {
    die("A senha deve conter pelo menos um número");
}

if ($senha !== $senha_confirmar) {
    die("As senhas devem ser iguais");
}


$password_hash = password_hash($senha, PASSWORD_DEFAULT);


$sql = "UPDATE usuarios
        SET senha_hash = ?,
            reset_token_hash = NULL,
            expire_token_at = NULL
        WHERE id_usuario = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ss", $password_hash, $user["id_usuario"]);

if ($stmt->execute()) {
    
    header("Location: atualizado.html");
    exit();
} else {
    die("Erro ao atualizar a senha: " . $stmt->error);
}