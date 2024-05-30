<?php
// Incluir o arquivo de configuração do banco de dados
include 'db_config.php';

// Inicializar um array para armazenar os dados dos clientes
$clientes = array();

// Consulta SQL para selecionar todos os clientes
$sql = "SELECT * FROM clientes";
$result = $conn->query($sql);

// Verificar se a consulta retornou algum resultado
if ($result->num_rows > 0) {
    // Loop através dos resultados da consulta e armazenar os dados dos clientes no array
    while ($row = $result->fetch_assoc()) {
        $clientes[] = $row;
    }
}

// Fechar a conexão com o banco de dados
$conn->close();

// Converter o array de clientes para formato JSON e retorná-lo
var_dump($clientes);
