<?php

$id = mysqli_real_escape_string($conn, $_GET['id-farm']);

$sqlExe = mysqli_query($conn, "SELECT * FROM farmacia WHERE id = $id");
while ($dados_farmacia = mysqli_fetch_assoc($sqlExe)) {
    ?>

    <div class="container">

        <div class="profile-container">
            <div class="profile">
                <div class="profile-info">
                    <img src="./includes/<?php echo $dados_farmacia['imagem_perfil'] ?>" alt="kkkkkkkk"
                        class="profile-logo">
                    <div>
                        <h1><?php echo $dados_farmacia['nome'] ?></h1>
                        <span class="badge text-bg-warning">
                            <?php echo $dados_farmacia['avaliacao'] ?>
                        </span>
                        <?php
                        for ($i = 1; $i <= round($dados_farmacia['avaliacao']); $i++) {
                            echo '<span><i class="bi bi-star-fill"></i> </span>';
                        }
                        ?>
                        </span>
                    </div>
                </div>
                <div class="profile-details">
                    <p>Pedido mínimo: R$ 69,00</p>
                    <p>Entrega em: 30-40 min • Grátis</p>
                </div>
            </div>

            <!-- colocar boxshadow -->
            <div class="search-bar-low">
                <div class="search-bar-div">
                    <span><i class="bi bi-search"></i></span>
                    <input type="text" placeholder="Buscar no catálogo">
                </div>
            </div>


            <section class="related-products">
                <h4> <span><i class="bi bi-basket2-fill"></i></span> Disponível no estoque</h4>

                <div class="products" style="border: 1px solid green;">
                    <?php

                    $sqlProd = mysqli_query($conn, "SELECT p.id, p.nome, p.preco_unitario, p.descricao, p.caminho_galeria, f.imagem_perfil, f.avaliacao FROM produto AS p INNER JOIN farmacia AS f ON p.fk_farmacia_id = f.id INNER JOIN categoria AS c ON  p.fk_categoria_id = c.id WHERE p.fk_farmacia_id = $id;");

                    while ($dados_prod = mysqli_fetch_assoc($sqlProd)) {
                        ?>
                        <div class="product-card" style="border: 1px solid red;">
                            <div class="product-header">
                                <img src="./includes/<?php echo $dados_farmacia['imagem_perfil'] ?>" alt="Logo da Drogaria"
                                    class="logo">
                                <span class="pharmacy-name"><?php echo $dados_farmacia['nome'] ?></span>
                                <span class="favorite"><i class="fa-regular fa-heart"></i></span>
                            </div>
                            <div class="product-card-image">
                                <a href="./review/product-review.html">
                                    <img src="./<?php echo $dados_prod['caminho_galeria'] ?>" alt="Medicamento">
                                </a>
                            </div>
                            <div class="details">
                                <p class="product-name"><?php echo $dados_prod['nome'] ?></p>
                                <span><?php echo $dados_prod['descricao'] ?></span>
                                <p class="price">R$ <?php echo $dados_prod['preco_unitario'] ?></p>
                                <div class="add-to-cart">
                                    <button class="add-to-cart-btn"
                                        onclick="addToCart('Weiva', 24.69, 'img/generico.png', 'Drogaria Loiola')">
                                        <i class="bi bi-bag-check"></i> ADICIONAR
                                    </button>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                </div>
        </div>

    <?php } ?>