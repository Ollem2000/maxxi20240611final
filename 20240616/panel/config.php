<?php
// Configurações de conexão
$servername = "mysql18-farm10.kinghost.net"; // Endereço do servidor MySQL
$username = "maxxiprintsupr"; // Nome de usuário do MySQL
$password = "nokiae61i"; // Senha do MySQL
$dbname = "maxxiprintsupr"; // Nome do banco de dados

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>