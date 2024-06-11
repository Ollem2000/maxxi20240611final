<?php
// Função para ler a lista de produtos de um arquivo
function lerProdutos($nomeArquivo) {
    $linhas = file($nomeArquivo, FILE_IGNORE_NEW_LINES);
    $produtos = [];

    foreach ($linhas as $linha) {
        list($nome, $marca, $categoria, $descricao, $preco, $imagem) = explode(':', $linha);
        $produtos[] = [
            'nome' => trim($nome),
            'marca' => trim($marca),
            'categoria' => trim($categoria),
            'descricao' => trim($descricao),
            'preco' => trim($preco),
            'imagem' => trim($imagem)
        ];
    }

    return $produtos;
}

// Lista de produtos
$produtos = lerProdutos('products.txt');

// Exibição dos produtos em formato de cartão
foreach ($produtos as $produto) {
    echo '<div class="produto-main-product" data-marca="' . $produto['marca'] . '" data-categoria="' . $produto['categoria'] . '">';
    echo '    <div class="produto-main-product-top">';
    echo '        <img src="assets/product/' . $produto['imagem'] . '" alt="' . $produto['nome'] . '">';
    echo '    </div>';
    echo '    <div class="produto-main-product-bottom">';
    echo '        <p class="produto-main-product-title">' . $produto['nome'] . '</p>';
    echo '        <p class="produto-main-product-brand">' . $produto['marca'] . '</p>';
    echo '        <p class="produto-main-product-category">' . $produto['categoria'] . '</p>';
    echo '        <p class="produto-main-product-description">' . $produto['descricao'] . '</p>';
    echo '        <p class="produto-main-product-price">' . $produto['preco'] . '</p>';
    echo '    </div>';
    echo '</div>';
}
?>