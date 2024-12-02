<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha - Myorhome Pets</title>
    <link rel="stylesheet" href="stylesSenha.css">
</head>
<body>
    <div class="container">
        <img src="logo.png" alt="logo.png" class="logo">
        <h2>Redefinir Senha</h2>
        <p>Insira seu e-mail para redefinir sua senha</p>
        <form action="" method="post">
            <input type="email" name="email" placeholder="Digite seu e-mail" required aria-label="E-mail para redefinição de senha">
            <div class="button-container">
                <button type="submit">Enviar</button>
            </div>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = trim($_POST['email']);

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                
                echo "<p>Um e-mail de redefinição de senha foi enviado para <strong>$email</strong>.</p>";
            } else {
                echo "<p>Por favor, insira um endereço de e-mail válido.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
