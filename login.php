<?php
$is_invalid= false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mysqli = require __DIR__ . "/conection_DB.php";
    $sql = sprintf("SELECT *FROM usuarios
            WHERE email = '%s'", 
            $mysqli->real_escape_string($_POST["email"]));
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    if ($user){
       if( password_verify($_POST["senha"], $user["senha_hash"])){
        session_start();
        session_regenerate_id();
        $_SESSION["user_id"] = $user["id_usuario"];
        header("Location: paginaOng.php");
        exit();
       }

    }
    
$is_invalid=true;
}
?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <title>Myorhome Pets</title>
    <link rel="stylesheet" href="stylelogin.css">
</head>
<body>
    <div class="container">
        <div class="left">
            <img alt="Um gato e um cachorro olhando atentamente" height="800" src="img/dogcat.png" width="910"/>
        </div>
        <div class="right">
            <div class="logo">
                <img alt="Myorhome Pets logo" height="150" src="img/logo.png" width="150"/>
            </div>
            <h1>Seja Bem-Vindo!</h1>
            <?php if ($is_invalid): ?>
                <em>Login invalido</em>
            <?php endif; ?>
            <form method="POST">
                <div class="form-group">
                    <label for="email">Login</label>
                    <input id="email" name="email" type="email" 
                    value="<?= htmlspecialchars( $_POST["email"] ?? "") ?>" /> 
                </div>
                <div class="form-group">
                    
                    <label for="senha">Senha</label>
                    <input id="senha" name="senha" type="password" required/>
                </div>
                <div class="buttons">
                    <button type="submit">EFETUAR LOGIN</button>
                    <a href="esqueciSenha.php">ESQUECI MINHA SENHA</a>
                </div>

                <div class="buttons">
    <button type="button" onclick="window.location.href='OngCadastrar.php'">CADASTRAR ONG</button>
</div>

            </form>
        </div>
    </div>
</body>
</html>