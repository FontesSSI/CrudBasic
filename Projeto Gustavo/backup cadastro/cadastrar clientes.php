<?php
include 'db_config.php';

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
    } else {
        echo "Erro ao cadastrar o cliente: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
