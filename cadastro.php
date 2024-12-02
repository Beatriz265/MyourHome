<?php

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    die("Email invalido");
}
if (strlen($_POST["senha"]) < 8) {
    die("Senha deve conter no mínimo 8 caracteres");
}
if (! preg_match("/[a-z]/i", $_POST["senha"])){
    die ("A senha deve conter no mínimo 1 letra");
}
if (! preg_match("/[0-9]/", $_POST["senha"])){
    die ("A senha deve conter no mínimo 1 numero");
}
if ( $_POST["senha"] !== $_POST["senha_comf"]){
die("Senhas não coincidem");
}
$password_hash = password_hash($_POST["senha"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/conection_DB.php";
$sql = "INSERT INTO usuarios (nome, email, senha_hash)
        VAlUES (?, ?, ?) ";
$stmt = $mysqli->stmt_init();
if ( ! $stmt->prepare($sql)){
    die("Erro no SQL" . $mysqli->error);
}
$stmt->bind_param("sss", $_POST["nome"],
                         $_POST["email"],
                         $password_hash);
if ($stmt->execute()) {
header(header: "Location: signup_successful.html");
exit();
}else {
    if ($mysqli->errno === 1062){
        die ("Email já cadastrado");
    } else {
    die($mysqli->error . " " . $mysqli->errno);
    }
}