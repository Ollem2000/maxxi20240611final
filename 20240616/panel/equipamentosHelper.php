<?php
// equipamentosHelper.php

include 'config.php';

function getEquipamentos() {
    global $conn;

    $equipamentos = [];

    $sql = "SELECT ID, NOME, MARCA, CATEGORIA, VALOR, DESCRICAO, DIRETORIO FROM equipamentos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $equipamentos[] = $row;
        }
    }

    return $equipamentos;
}
?>

<?php
// equipamentosHelper.php

include 'config.php';

function getEquipamentoById($id) {
    global $conn;

    $sql = "SELECT NOME, MARCA, CATEGORIA, VALOR, DESCRICAO, DIRETORIO FROM equipamentos WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($nome, $marca, $categoria, $valor, $descricao, $diretorio);
    $stmt->fetch();

    $equipamento = [
        'nome' => $nome,
        'marca' => $marca,
        'categoria' => $categoria,
        'valor' => $valor,
        'descricao' => $descricao,
        'diretorio' => $diretorio
    ];

    $stmt->close();

    return $equipamento;
}
?>