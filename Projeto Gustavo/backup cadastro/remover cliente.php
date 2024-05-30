<?php
include 'db_config.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM clientes WHERE id = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "Cliente removido com sucesso!";
    } else {
        echo "Erro ao remover o cliente: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "ID inválido fornecido.";
}
?>
