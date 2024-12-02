<?php
$host = "localhost";
$database = "myourhome";
$username ="root";
$password = "nova_senha";
$mysqli = new mysqli($host, $username, $password, $database);


if ($mysqli->connect_errno){
    die( "Erro na conexão " . $mysqli->connect_errno);
}
return $mysqli;