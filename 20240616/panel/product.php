<?php
// product.php

include 'equipamentosHelper.php';

$equipamentos = getEquipamentos();

foreach ($equipamentos as $equipamento) {
    $nome = $equipamento["NOME"];
    $marca = $equipamento["MARCA"];
    $categoria = $equipamento["CATEGORIA"];
    $descricao = $equipamento["DESCRICAO"];
    $diretorio = $equipamento["DIRETORIO"];
    $valor = $equipamento["VALOR"];
    $id = $equipamento["ID"];

    // Renderizar HTML para cada equipamento
    echo '<div class="content-2"
            data-nome="' . $nome . '" 
            data-marca="' . $marca . '" 
            data-categoria="' . $categoria . '"
            data-descricao="' . $descricao . '" 
            data-diretorio="' . $diretorio . '">';
    echo '  <div class="content-image-2">';
    echo '      <img src="' . $diretorio . '" alt="Imagem do Produto">';
    echo '  </div>';
    echo '  <div class="content-text-2">';
    echo '      <p class="text-title-2 text-bold text-color-' . $marca . '-1">' . $marca . " " . $nome . '</p>';
    echo '      <p class="text-brand-1">' . $marca . '</p>';
    echo '      <p class="text-subtitle-1">' . $categoria . '</p>';
    echo '      <p class="text-description-1">' . $descricao . '</p>';
    echo '      <p class="text-price-1">R$ ' . number_format($valor, 2, ',', '.') . '</p>';
    echo '      <div class="content-button-2">';
    echo '          <a class="button-2" href="google.com">leia mais</a>';
    echo '          <p class="button-2">&#128065;</p>';
    echo '      </div>';
    echo '  </div>';
    echo '  <div class="content-button-2">';
    echo '      <a class="button-2" href="item.php?id=' . $id . '">Abrir item.php</a>';
    echo '      <p class="button-2 abrir-popup">&#128065;</p>';
    echo '  </div>';
    echo '</div>';
}
?>