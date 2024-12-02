<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de ONG - Myorhome Pets</title>
    <link rel="stylesheet" href="styleOngCadastro.css">

    
</head>
<body>

    <h1>Cadastro de ONG</h1>
    <div class="container">
        <form action=" cadastro.php" method="post" novalidate>
        <div class="form-group">
                <label for="nome">Nome da Ong</label>
                <input id="Nome" name="nome" type="text" required />
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input id="email" name="email" type="email" required />
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input id="senha" name="senha" type="password" required />
            </div>
            <div class="form-group">
                <label for="senha_comf">Comfirmar Senha</label>
                <input id="senha_comf" name="senha_comf" type="password" required />
            </div>
            <button type="submit" class="btn-submit">Cadastrar</button>
        </form>
    </div>

</body>
</html>
