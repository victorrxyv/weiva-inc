<?php

$id = mysqli_real_escape_string($conn, $_GET['id-farm']);

//$sqlExe = mysqli_query($conn, "SELECT * FROM produto WHERE id = $id");

$sqlExe = mysqli_query($conn, "SELECT * FROM farmacia WHERE id = $id");

while ($dado = mysqli_fetch_assoc($sqlExe)) {
    ?>

    <div class="container">

        <div class="profile-container">
            <div class="profile">
                <div class="profile-info">
                    <img src="./includes/<?php echo $dado['imagem_perfil'] ?>" alt="kkkkkkkk" class="profile-logo">
                    <div>
                        <h1>Farmácia</h1>
                        <span><i class="bi bi-star-fill"></i></span>
                        <span><i class="bi bi-star-fill"></i></span>
                        <span><i class="bi bi-star-fill"></i></span>
                        <span><i class="bi bi-star-fill"></i></span>
                        <span><i class="bi bi-star-fill"></i></span>
                    </div>
                </div>
                <div class="profile-details">
                    <p>Pedido mínimo: R$ 69,00</p>
                    <p>Entrega em: 30-40 min • Grátis</p>
                </div>
            </div>

            <div class="search-bar-low">
                <div class="search-bar-div">
                    <span><i class="bi bi-search"></i></span>
                    <input type="text" placeholder="Buscar no catálogo">
                </div>
            </div>


            <section class="related-products">
                <h4> <span><i class="bi bi-basket2-fill"></i></span> Disponível no estoque</h4>

                <div class="products">

                    <div class="product-card">
                        <div class="product-header">
                            <img src="./includes/<?php echo $dado['imagem_perfil'] ?>" alt="Logo da Drogaria" class="logo">
                            <span class="pharmacy-name">Drogaria Loiola</span>
                            <span class="favorite"><i class="fa-regular fa-heart"></i></span>
                        </div>
                        <div class="product-card-image">
                            <a href="./review/product-review.html">
                                <img src="../img/generico.png" alt="Medicamento">
                            </a>
                        </div>
                        <div class="details">
                            <p class="product-name">Medicamento genérico com um nome muito
                                grandeKAKAKAKAKAKAAKAKAKAKAKAKAKAKAL</p>
                            <p class="price">R$ 69,24</p>
                            <div class="add-to-cart">
                                <button class="add-to-cart-btn"
                                    onclick="addToCart('Weiva', 24.69, 'img/generico.png', 'Drogaria Loiola')">
                                    <i class="bi bi-bag-check"></i> ADICIONAR
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
        </div>

    <?php } ?>