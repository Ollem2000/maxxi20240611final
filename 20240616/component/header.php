<div id="header-logo">
    <img src="assets/logo/logo-maxxi.svg">
    <!--a href="index.php"><img src="assets/logo/logo-maxxi.svg"></a-->
</div>
<button id="menu-toggle">☰</button>
<div id="header-navbar">
    <a href="index.php">INÍCIO</a>
    <p class="header-dot">•</p>
    <a href="manutencao.php">MANUTENÇÃO</a>
    <p class="header-dot">•</p>
    <div class="dropdown">
        <a href="produto.php" class="dropbtn">EQUIPAMENTOS</a>
        <div class="dropdown-content">
            <a href="#" class="marca-link" data-marca="Prix">Prix</a>
            <a href="#" class="marca-link" data-marca="Elgin">Elgin</a>
            <a href="#" class="marca-link" data-marca="Skymsen">Skymsen</a>
            <a href="#" class="marca-link" data-marca="UPX">UPX</a>
        </div>
    </div>
    <p class="header-dot">•</p>
    <a href="grafica.php">BOBINAS</a>
    <p class="header-dot">•</p>
    <a href="sobrenos.php">SOBRE NÓS</a>
</div>

<script>
document.getElementById('menu-toggle').addEventListener('click', function() {
    var navbar = document.getElementById('header-navbar');
    navbar.classList.toggle('active');
});

document.querySelectorAll('.marca-link').forEach(function(link) {
    link.addEventListener('click', function(event) {
        event.preventDefault();
        var marca = this.getAttribute('data-marca');
        var url = 'produto.php?marca=' + encodeURIComponent(marca);
        window.location.href = url;
    });
});
</script>

<style>
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1;}
</style>