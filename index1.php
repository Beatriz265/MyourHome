
<?php
session_start();
if (isset($_SESSION["user_id"])){
    $mysqli= require __DIR__ . "/conection_DB.php";
    $sql = "SELECT * FROM usuarios
            WHERE id_usuario = {$_SESSION["user_id"]}";

$result = $mysqli->query($sql);
$user = $result->fetch_assoc();
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Home</h1>
<?php if (isset($user)): ?>
    <p>Bem vindo <?=htmlspecialchars( $user["nome"])?></p>
    <p><a href=logout.php>Sair</a></p>
<?php else: ?>
    <p><a href="login.php">Login</a> ou <a href="OngCadastrar.php">Cadastre-se</a></p>
<?php endif; ?>
    
</body>
</html