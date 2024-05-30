<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $nomedopet = $_POST['nomedopet'];

    $sql = "INSERT INTO clientes (nome, email, telefone, endereco, nomedopet) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("sssss", $nome, $email, $telefone, $endereco, $nomedopet);
    if ($stmt->execute()) {
        echo "Cliente cadastrado com sucesso!";
        echo "<scritton>alert('Cliente cadastrado com sucesso!');</script>";
    } else {
        echo "Erro ao cadastrar o cliente: " . $stmt->error;
        echo "<scritton>alert('Cliente nao foi cadastrado: " . $stmt->error . "');</script>";
    }

    $stmt->close();
    $conn->close();
}
