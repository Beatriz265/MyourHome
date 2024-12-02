<?php
$nome = $_POST["name"];
$idade = $_POST["idade"];
$tipo = $_POST["tipo"];
$descricao = $_POST["descricao"];
$imagem = $_POST["imagem"];
$sql = "INSERT INTO animais(nome, idade,tipo, descricao)
values (?,?,?,?,?) ";

$stmt = mysqli_stmt_init($conn);

If(! mysqli_stmt_prepare($stmt,$sql)){
    die(mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt, "siss", 
$nome,$idade, $tipo, $descricao );
mysqli_stmt_execute($stmt);
Echo "Informaçãoes Salvas";