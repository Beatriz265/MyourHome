<?php
$token = $_GET["token"];
$token_hash = hash("sha256", $token);
$mysqli = require __DIR__ . "/conection_DB.php";
$sql = "SELECT * FROM usuarios
        WHERE reset_token_hash = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $token_hash);
$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ( $user === null ) {
    die ("Token não achado");
}

if (strtotime($user["expire_token_at"]) <= time()){
    die ("Token expirou");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha</title>
</head>
<body>
    <h1>Redefinir Senha  </h1>
    <form method="post" action="processReset.php">
        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

        <label for="senha">Nova senha</label>
        <input type="password" id="senha" name="senha">
        
        <label for="senha_comfirmar">Confirme a senha</label>
        <input type="password" id="senha_comfirmar" name="senha_comfirmar">
        <button>Enviar</button>

      </form>
</body>
</html>