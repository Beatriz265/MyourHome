<?php
$mysqli = require __DIR__ . "/conection_DB.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar se todos os campos obrigatórios estão preenchidos
    if (!empty($_POST['nome']) && !empty($_POST['idade']) && !empty($_POST['tamanho']) && 
        !empty($_POST['peso']) && !empty($_POST['cor']) && !empty($_POST['tipo']) && 
        !empty($_POST['contato']) && !empty($_POST['descricao'])) {
        
        $nome = htmlspecialchars($_POST['nome']);
        $idade = htmlspecialchars($_POST['idade']);
        $tamanho = htmlspecialchars($_POST['tamanho']);
        $peso = htmlspecialchars($_POST['peso']);
        $cor = htmlspecialchars($_POST['cor']);
        $tipo = htmlspecialchars($_POST['tipo']);
        $contato = htmlspecialchars($_POST['contato']);
        $descricao = htmlspecialchars($_POST['descricao']);
        $imagemNome = null;

        // Verificação da imagem
        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
            $imagem = $_FILES['imagem'];
            $imagemNome = 'uploads/' . basename($imagem['name']);
            move_uploaded_file($imagem['tmp_name'], $imagemNome);
        } else {
            echo "O arquivo enviado não é uma imagem válida.";
    }

        // Inserindo os dados na tabela `animais`
       /* $sql = "INSERT INTO animais (nome, idade, tamanho, peso, cor, tipo, contato, descricao, imagem) 
                VALUES ('$nome', '$idade', '$tamanho', '$peso', '$cor', '$tipo', '$contato', '$descricao', '$imagemNome')";*/
$stmt = $mysqli->prepare("INSERT INTO animais (nome, idade, tamanho, peso, cor, tipo, contato, descricao, imagem) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssissssss", $nome, $idade, $tamanho, $peso, $cor, $tipo, $contato, $descricao, $imagemNome);

if ($stmt->execute()) {
    echo "Animal cadastrado com sucesso!";
    header("Location: paginaOng.php");
    exit;
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
    }
} else {
        echo "Preencha todos os campos obrigatórios!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registro de Animais - Myorhome Pets</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="stylecadastropets.css" rel="stylesheet"/>
</head>
<body>

    <h1>Registro de Animais para Adoção</h1>
    <div class="container">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input id="nome" name="nome" type="text" required />
            </div>
            <div class="form-group">
                <label for="idade">Idade</label>
                <input id="idade" name="idade" type="number" required />
            </div>
            <div class="form-group">
                <label for="tamanho">Tamanho</label>
                <input id="tamanho" name="tamanho" type="text" required />
            </div>
            <div class="form-group">
                <label for="peso">Peso</label>
                <input id="peso" name="peso" type="number" required />
            </div>
            <div class="form-group">
                <label for="cor">Cor</label>
                <input id="cor" name="cor" type="text" required />
            </div>
            <div class="form-group">
                <label for="tipo">Tipo (Cachorro, Gato, etc.)</label>
                <input id="tipo" name="tipo" type="text" required />
            </div>
            <div class="form-group">
                <label for="contato">Contato</label>
                <input id="contato" name="contato" type="text" required />
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
           
            
        </form>
    </div>
</body>
</html>