<?php
// Verificar se o ID foi passado via GET
if (isset($_GET['id'])) {
    $item_id = $_GET['id'];

    // Configurações de conexão (arquivo config.php)
    include 'config.php';

    // Query para selecionar os detalhes do equipamento específico
    $sql = "SELECT NOME, MARCA, CATEGORIA, VALOR, DESCRICAO, DIRETORIO FROM equipamentos WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $item_id);
    $stmt->execute();
    $stmt->bind_result($nome, $marca, $categoria, $valor, $descricao, $diretorio);
    $stmt->fetch();

    // Verificar se o equipamento foi encontrado
    if ($nome) {
        // Variáveis disponíveis para uso em item.php:
        // $nome, $marca, $categoria, $valor, $descricao, $diretorio
    } else {
        echo "Equipamento não encontrado.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Nenhum ID de equipamento fornecido.";
}
?>


<?php
// itemConfig.php

include 'equipamentosHelper.php';

if (isset($_GET['id'])) {
    $item_id = $_GET['id'];

    $equipamento = getEquipamentoById($item_id);

    if ($equipamento) {
        // Variáveis disponíveis:
        // $equipamento['nome'], $equipamento['marca'], $equipamento['categoria'], 
        // $equipamento['valor'], $equipamento['descricao'], $equipamento['diretorio']
    } else {
        echo "Equipamento não encontrado.";
    }
} else {
    echo "Nenhum ID de equipamento fornecido.";
}
?>