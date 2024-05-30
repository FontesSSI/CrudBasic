<?php
$servername = "127.0.0.1";
$username = "root";
$password = "12345678";
$dbname = "db_cadastro_de_clientes";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
