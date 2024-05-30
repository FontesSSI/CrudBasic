<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "db_crud";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
