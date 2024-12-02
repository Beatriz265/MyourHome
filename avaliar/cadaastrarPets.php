<?php
include 'conection_DB.php';
session_start();

if (!isset($_SESSION['animais'])) {
    $_SESSION['animais'] = [];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = htmlspecialchars($_POST['nome']);
    $idade = htmlspecialchars($_POST['idade']);
    $tipo = htmlspecialchars($_POST['tipo']);
    $descricao = htmlspecialchars($_POST['descricao']);

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $imagem = $_FILES['imagem'];
        $imagemNome = basename($imagem['name']);
        $imagemDir = 'uploads/'; 

        if (move_uploaded_file($imagem['tmp_name'], $imagemDir . $imagemNome)) {
            $_SESSION['animais'][] = [
                'nome' => $nome,
                'idade' => $idade,
                'tipo' => $tipo,
                'descricao' => $descricao,
                'imagem' => $imagemDir . $imagemNome 
            ];

            // Redireciona após o registro
            header('Location: cadaastrarPets.php?success=1');
            exit();
        } else {
            echo "Erro ao fazer upload da imagem.";
        }
    } else {
        echo "Erro ao enviar a imagem.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registro de Animais - Myorhome Pets</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        /* Seu CSS aqui */
    </style>
</head>
<body>

    <h1>Registro de Animais para Adoção</h1>
    <div class="container">
        <form method="post" enctype="multipart/form-data" action="petscasdastro.php" >
            <div class="form-group">
                <label for="nome">Nome</label>
                <input id="nome" name="nome" type="text" required />
            </div>
            <div class="form-group">
                <label for="idade">Idade</label>
                <input id="idade" name="idade" type="text" required />
            </div>
            <div class="form-group">
                <label for="tipo">Tipo (Cachorro, Gato, etc.)</label>
                <input id="tipo" name="tipo" type="text" required />
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea id="descricao" name="descricao" required></textarea>
            </div>
            <div class="form-group">
                <label for="imagem">Imagem</label>
                <input id="imagem" name="imagem" type="file" accept="image/*" required />
            </div>
            <button type="submit" class="btn-submit">Registrar Animal</button>

            <div class="buttons">
                <button type="button" onclick="window.location.href='index.php'">PÁGINA PRINCIPAL</button>
            </div>
        </form>
    </div>

    <?php
    // Mensagem de sucesso
    if (isset($_GET['success'])) {
        echo "<p style='color: green;'>Animal registrado com sucesso!</p>";
    }
    ?>
    
</body>
</html>