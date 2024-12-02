<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Myour Home Pet's Doações</title>
    <link rel="stylesheet" href="styleindex2.css">

</head>
<body>
    <header>
        <h1>Myour Home Pet's Doações</h1>
        <a class="botao" href="testeLogin.php">Login</a>
    </header>

    <main>
        <?php
        $login = $_POST["login"];
        $senha = $_POST["senha"];
        // Array de animais para simulação
        $animais = [
            [
                "nome" => "Rex",
                "idade" => "2 anos",
                "tamanho" => "Médio",
                "peso" => "20 kg",
                "cor" => "Marrom",
                "tipo" => "Cachorro",
                "contato" => "exemplo@gmail.org.br",
                "imagem" => "cachorro.jpg"
            ],
            [
                "nome" => "Mimi",
                "idade" => "1 ano",
                "tamanho" => "Pequeno",
                "peso" => "5 kg",
                "cor" => "Branco",
                "tipo" => "Gato",
                "contato" => "exemplo@gmail.org.br",
                "imagem" => "gato.jpg"
            ],
            [
                "nome" => "Jennie",
                "idade" => "0 ano",
                "tamanho" => "Pequeno",
                "peso" => "1 kg",
                "cor" => "Branco com marrom",
                "tipo" => "Cachorro",
                "contato" => "exemplo@gmail.org.br",
                "imagem" => "gato.jpg"
            ],
            [
                "nome" => "Lulu",
                "idade" => "7 ano",
                "tamanho" => "Grande",
                "peso" => "8 kg",
                "cor" => "Preto",
                "tipo" => "Gato",
                "contato" => "exemplo@gmail.org.br",
                "imagem" => "gato.jpg"
            ],
            [
                "nome" => "Emme",
                "idade" => "3 ano",
                "tamanho" => "Medio",
                "peso" => "4 kg",
                "cor" => "Branco e acinzentado",
                "tipo" => "Gato",
                "contato" => "exemplo@gmail.org.br",
                "imagem" => "gato.jpg"
            ],
            [
                "nome" => "Floquinho",
                "idade" => "4 ano",
                "tamanho" => "Pequeno",
                "peso" => "5 kg",
                "cor" => "Branco e marrom",
                "tipo" => "Cachorro",
                "contato" => "exemplo@gmail.org.br",
                "imagem" => "gato.jpg"
            ],
            [
                "nome" => "Hancock",
                "idade" => "9 ano",
                "tamanho" => "Pequeno",
                "peso" => "5 kg",
                "cor" => "Branco e amarelo queimado",
                "tipo" => "Cachorro",
                "contato" => "exemplo@gmail.org.br",
                "imagem" => "gato.jpg"
            ],
            [
                "nome" => "Caramelo",
                "idade" => "5 ano",
                "tamanho" => "Medio",
                "peso" => "6 kg",
                "cor" => "Caramelo",
                "tipo" => "Cachorro",
                "contato" => "exemplo@gmail.org.br",
                "imagem" => "gato.jpg"
            ]
        ];

        // Loop para exibir os animais
        foreach ($animais as $animal) {
            echo '<section class="animal">';
            echo '<img src="' . $animal['imagem'] . '" alt="' . $animal['nome'] . '">';
            echo '<h2>Nome: ' . $animal['nome'] . '</h2>';
            echo '<p>Idade: ' . $animal['idade'] . '</p>';
            echo '<p>Tamanho: ' . $animal['tamanho'] . '</p>';
            echo '<p>Peso: ' . $animal['peso'] . '</p>';
            echo '<p>Cor: ' . $animal['cor'] . '</p>';
            echo '<p>Tipo: ' . $animal['tipo'] . '</p>';
            echo '<p>Contato: ' . $animal['contato'] . '</p>';
            echo '</section>';
        }
        ?>
    </main>
</body>
</html>
