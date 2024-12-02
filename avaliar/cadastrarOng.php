<?php
session_start();


$error = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $senha = htmlspecialchars($_POST['senha']);
    

    if (preg_match('/^[a-zA-Z0-9._%+-]+@gmail\.org\.br$/', $email)) {
        
        $_SESSION['ong'] = [
            'email' => $email,
            'senha' => password_hash($senha, PASSWORD_DEFAULT) 
        ];
        header("Location: index.php"); 
        exit();
    } else {
        $error = "O E-mail deve estar no formato @gmail.org.br.";
    }
}
?>

