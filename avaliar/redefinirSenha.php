<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            background: #333;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background: #555;
        }
    </style>
</head>
<body>



    <div class="container">
        <h2>Redefinir Senha</h2>
        <form method="POST" action="resetarSenha.php">
            <input type="password" name="nova_senha" placeholder="Nova Senha" required>
            <input type="password" name="confirmar_senha" placeholder="Confirmar Nova Senha" required>
            <input type="hidden" name="email" value="exemplo@gmail.org.br"> <!-- E-mail do usuário -->
            <button type="submit">Confirmar</button>
        </form>
    </div>
</body>
</html>
