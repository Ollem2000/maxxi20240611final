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
    echo '<div class="content-2" data-marca="' . $produto['marca'] . '" data-categoria="' . $produto['categoria'] . '">';
    echo '    <div class="content-image-2">';
    echo '        <img src="assets/product/' . $produto['imagem'] . '" alt="' . $produto['nome'] . '">';
    echo '    </div>';
    echo '    <div class="content-text-2">';
    echo '        <p class="text-title-2 text-bold">' . $produto['nome'] . '</p>';
    echo '        <p class="text-brand-1">' . $produto['marca'] . '</p>';
    echo '        <p class="text-subtitle-1">' . $produto['categoria'] . '</p>';
    echo '        <p class="text-description-1">' . $produto['descricao'] . '</p>';
    echo '        <p class="text-price-1">' . $produto['preco'] . '</p>';
    echo '    </div>';
    echo '</div>';
}
?>