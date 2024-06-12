<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<title>Equipamentos</title>
		<?php include 'component/head.php'; ?>
	</head>
	<body>
		<header>
			<?php include 'component/header.php'; ?>
		</header>
		<main>
			<div class="hero">
				<img src="assets/hero/hero-vendas.jpg">
			</div>
			<section class="section-2 section-size-1">
			<article class="article-size-2">
				<p class="text-title-1 text-center">EQUIPAMENTOS</p>
				<p class="text-paragraph-1">
				A Maxxi é uma empresa autorizada para vender e fazer a manutenção de balanças digitais das marcas Toledo Prix, Elgin, UPX e Skymsen, oferecendo soluções de alta qualidade para mercados.
				<br/>
				<br/>
				Interessado em algum dos nossos produtos?<br/> Entre em contato agora mesmo para solicitar um orçamento.
				</p>
				<input type="text" id="search" class="search-bar" placeholder="Olá, digite aqui o nome do produto que deseja.">
				
				<div id="filter-container">
					<p class="text-filter-title">Marca</p>
					<div class="filter-div">
						<label><input type="checkbox" class="filter" data-filter-type="marca" value="Prix"> PRIX</label><br>
						<label><input type="checkbox" class="filter" data-filter-type="marca" value="Elgin"> ELGIN</label><br>
						<label><input type="checkbox" class="filter" data-filter-type="marca" value="Skymsen"> SKYMSEN</label>
						<label><input type="checkbox" class="filter" data-filter-type="marca" value="UPX"> UPX</label>
					</div>
					<br/>
					<p class="text-filter-title">Categoria</p>
					<div class="filter-div">
						<label><input type="checkbox" class="filter" data-filter-type="categoria" value="Balança"> Balança</label><br>
						<label><input type="checkbox" class="filter" data-filter-type="categoria" value="Impressora"> Impressora</label><br>
						<label><input type="checkbox" class="filter" data-filter-type="categoria" value="Liquidificador"> Liquidificador</label>
						<label><input type="checkbox" class="filter" data-filter-type="categoria" value="Extrator"> Extrator</label>
						<label><input type="checkbox" class="filter" data-filter-type="categoria" value="Fatiador"> Fatiador</label>
						<label><input type="checkbox" class="filter" data-filter-type="categoria" value="Processador"> Processador</label>
						<label><input type="checkbox" class="filter" data-filter-type="categoria" value="Moedor de Carne"> Moedor de Carne</label>
						<label><input type="checkbox" class="filter" data-filter-type="categoria" value="Serra Fita"> Serra Fita</label>
					</div>
				</div>
					
				<p class="produto-main-brand">Toledo Prix</p>
					<div id="produto-main-product-container">
						<?php include 'listagem_produtos.php'; ?>
					</div>
			</article>
			</section>
		</main>
		<footer>
			<?php include 'component/footer.php'; ?>
		</footer>
    <script>
        document.getElementById('search').addEventListener('input', filterCards);
        document.querySelectorAll('.filter').forEach(function(filter) {
            filter.addEventListener('change', filterCards);
        });

        function filterCards() {
            let searchQuery = document.getElementById('search').value.toLowerCase();
            let selectedMarcas = Array.from(document.querySelectorAll('.filter[data-filter-type="marca"]:checked')).map(function(el) { return el.value; });
            let selectedCategorias = Array.from(document.querySelectorAll('.filter[data-filter-type="categoria"]:checked')).map(function(el) { return el.value; });

            let cards = document.querySelectorAll('.produto-main-product');

            cards.forEach(function(card) {
                let cardText = card.textContent.toLowerCase();
                let cardMarca = card.getAttribute('data-marca');
                let cardCategoria = card.getAttribute('data-categoria');

                let matchesSearch = cardText.includes(searchQuery);
                let matchesMarca = selectedMarcas.length === 0 || selectedMarcas.includes(cardMarca);
                let matchesCategoria = selectedCategorias.length === 0 || selectedCategorias.includes(cardCategoria);

                if (matchesSearch && matchesMarca && matchesCategoria) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
	</script>
	</body>
</html>