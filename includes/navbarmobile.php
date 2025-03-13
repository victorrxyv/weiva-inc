<!--nav bar mobile-->
<nav class="nav-mobile">
    <a href="index.php">
        <span><i class="bi bi-house-door-fill"></i></span>
        <span>Ínicio</span>
    </a>
    <a href="index.php?pages=categorias.php&cat-prod=medicamentos.php&categoria=all">
        <span><i class="bi bi-table"></i></span>
        <span>Categoria</span>
    </a>
    <a href="#">
        <span><i class="bi bi-tags"></i></span>
        <span>Promoções</span>
    </a>
    <a href="./cart.html">
        <span><i class="bi bi-cart4"></i></span>
        <span>Carrinho</span>
    </a>
</nav>

<script src="./script.js"></script>

<script>
    function toggleMenu() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        sidebar.classList.toggle('open');
        overlay.classList.toggle('show');
    }
</script>