<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Equipamentos</title>
    <?php include 'component/head.php'; ?>
    <style>
    .content {
        flex: 1;
        padding: 10px;
    }
    .filter-container {
        position: relative;
    }
    .filter-options {
        width: 192px;
        padding: 9px 0 9px 0;
        display: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #f9f9f9;
        position: absolute;
        z-index: 1;
        overflow: hidden;
    }
    .filter-options label {
        padding: 8px;
        margin: -9px 0 -9px 0;
        display: block;
    }
    .filter-options label:hover {
        background: #ccc;
    }
    .filter-container.show .filter-options {
        display: block;
    }
    </style>
</head>
<body>
<header>
    <?php include 'component/header.php'; ?>
</header>
<main>
    <div class="hero-1">
        <img class="hero-image-1" src="assets/hero/hero-vendas.jpg">
    </div>
    <section class="section-1 section-size-1">
        <article class="article-1 article-size-2 article-gap-1">
            <p class="text-title-1 text-center">EQUIPAMENTOS</p>
            <p class="text-paragraph-1">
                A Maxxi é uma empresa autorizada para vender e fazer a manutenção de balanças digitais das marcas Toledo Prix, Elgin, UPX e Skymsen, oferecendo soluções de alta qualidade para mercados.
                <br/>
                <br/>
                Interessado em algum dos nossos produtos?<br/> Entre em contato agora mesmo para solicitar um orçamento.
            </p>
        </article>
        <article class="article-1 article-size-2 article-gap-2">
            <input type="text" id="search" class="form-1" placeholder="🔍 Digite aqui o nome do produto que deseja.">
            <div class="container-2">
                <div class="filter-container">
                    <p class="button-1" onclick="toggleFilterOptions(this)">Marca ▼</p>
                    <div class="filter-options">
                        <label><input type="checkbox" class="filter" data-filter-type="marca" value="Prix"> Prix</label><br>
                        <label><input type="checkbox" class="filter" data-filter-type="marca" value="Elgin"> Elgin</label><br>
                        <label><input type="checkbox" class="filter" data-filter-type="marca" value="Skymsen"> Skymsen</label><br>
                        <label><input type="checkbox" class="filter" data-filter-type="marca" value="UPX"> UPX</label>
                    </div>
                </div>
                <div class="filter-container">
                    <p class="button-1" onclick="toggleFilterOptions(this)">Categoria ▼</p>
                    <div class="filter-options">
                        <label><input type="checkbox" class="filter" data-filter-type="categoria" value="Balança"> Balança</label><br>
                        <label><input type="checkbox" class="filter" data-filter-type="categoria" value="Impressora"> Impressora</label><br>
                        <label><input type="checkbox" class="filter" data-filter-type="categoria" value="Liquidificador"> Liquidificador</label><br>
                        <label><input type="checkbox" class="filter" data-filter-type="categoria" value="Extrator"> Extrator</label><br>
                        <label><input type="checkbox" class="filter" data-filter-type="categoria" value="Fatiador"> Fatiador</label><br>
                        <label><input type="checkbox" class="filter" data-filter-type="categoria" value="Processador"> Processador</label><br>
                        <label><input type="checkbox" class="filter" data-filter-type="categoria" value="Moedor de Carne"> Moedor de Carne</label><br>
                        <label><input type="checkbox" class="filter" data-filter-type="categoria" value="Serra Fita"> Serra Fita</label>
                    </div>
                </div>
            </div>
        </article>
        <article class="article-2 article-size-2 article-gap-1">
            <div id="popup" class="popup">
                <div class="popup-content">
                    <div class="container-1 box-title-1">
                        <h2 id="popup-title">Título do Popup</h2>
                        <span class="close-btn">&times;</span>
                    </div>
                    <div class="article-size-3">
                        <p id="popup-content" class="container-4">Conteúdo do Popup</p>
                    </div>
                </div>
            </div>
            <div class="container-3">
                <?php include 'panel/product.php'; ?>
            </div>
            <div class="container-3">
                <?php include 'listagem_produtos.php'; ?>
            </div>
        </article>
    </section>
</main>
<footer>
    <?php include 'component/footer.php'; ?>
</footer>
<script>
function toggleFilterOptions(element) {
    const filterContainer = element.parentElement;
    filterContainer.classList.toggle('show');
}

document.getElementById('search').addEventListener('input', filterCards);
document.querySelectorAll('.filter').forEach(function(filter) {
    filter.addEventListener('change', filterCards);
});

function filterCards() {
    let searchQuery = document.getElementById('search').value.toLowerCase();
    let selectedMarcas = Array.from(document.querySelectorAll('.filter[data-filter-type="marca"]:checked')).map(function(el) { return el.value; });
    let selectedCategorias = Array.from(document.querySelectorAll('.filter[data-filter-type="categoria"]:checked')).map(function(el) { return el.value; });

    let cards = document.querySelectorAll('.content-2');

    cards.forEach(function(card) {
        let cardText = card.textContent.toLowerCase();
        let cardMarca = card.getAttribute('data-marca');
        let cardCategoria = card.getAttribute('data-categoria');

        let matchesSearch = cardText.includes(searchQuery);
        let matchesMarca = selectedMarcas.length === 0 || selectedMarcas.includes(cardMarca);
        let matchesCategoria = selectedCategorias.length === 0 || selectedCategorias.includes(cardCategoria);

        if (matchesSearch && matchesMarca && matchesCategoria) {
            card.style.display = 'flex';
        } else {
            card.style.display = 'none';
        }
    });
}

// Marcar checkbox automaticamente com base na URL
document.addEventListener('DOMContentLoaded', (event) => {
    const urlParams = new URLSearchParams(window.location.search);
    const selectedMarca = urlParams.get('marca');

    if (selectedMarca) {
        document.querySelectorAll('.filter[data-filter-type="marca"]').forEach((checkbox) => {
            if (checkbox.value === selectedMarca) {
                checkbox.checked = true;
                filterCards();
            }
        });
    }

    const openPopupBtns = document.querySelectorAll('.abrir-popup');
    const popup = document.getElementById('popup');
    const closeBtn = document.querySelector('.close-btn');
    const popupTitle = document.getElementById('popup-title');
    const popupContent = document.getElementById('popup-content');

    openPopupBtns.forEach(button => {
        button.addEventListener('click', (e) => {
            const card = e.target.closest('.content-2');
            const marca = card.getAttribute('data-marca');
            const categoria = card.getAttribute('data-categoria');
            const nome = card.getAttribute('data-nome');
            const descricao = card.getAttribute('data-descricao');
            const valor = card.getAttribute('data-valor');
            const diretorio = card.getAttribute('data-diretorio');
            console.log(card);

            popupTitle.textContent = marca + " " + nome;
            popupContent.innerHTML = `
                <div class="content-3">
                    <div class="content-image-2">
                        <img src="${diretorio}">
                    </div>
                    <div class="content-image-3">
                        <img class="height-96px" src="assets/partner/partner-${marca}.png">
                    </div>
                    <div class="content-button-2">
                        <a class="button-2">Leia mais</a>
                    </div>
                </div>
                <div class="content-3 width-100">
                    <div class="content-text-1 width-100">
                        <p class="text-title-1 text-blue-1">${nome}</p>
                        <p class="text-title-2 text-bold">${marca}</p>
                        <p class="text-subtitle-1">${categoria}</p>
                    </div>
                    <div class="content-text-1 width-100">
                        <p>${descricao}</p>
                    </div>
                </div>
            `;

            popup.style.display = 'block';
        });
    });

    closeBtn.addEventListener('click', () => {
        popup.style.display = 'none';
    });

    popup.addEventListener('click', (e) => {
        if (e.target === popup) {
            popup.style.display = 'none';
        }
    });
});
</script>
</body>
</html>