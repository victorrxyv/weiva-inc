<?php

$id = mysqli_real_escape_string($conn, $_GET['id-prod']);

//$sqlExe = mysqli_query($conn, "SELECT * FROM produto WHERE id = $id");

$sqlExe = mysqli_query($conn, "SELECT p.nome, p.preco_unitario, p.caminho_galeria, c.descricao, f.id, f.nome, f.avaliacao, f.imagem_perfil FROM produto p INNER JOIN farmacia f ON  p.fk_farmacia_id = f.id INNER JOIN categoria c ON  p.fk_categoria_id = c.id WHERE p.id = $id");

while ($dado = mysqli_fetch_assoc($sqlExe)) {
  ?>

  <main class="product-details">
    <div class="product-container">
      <div class="product-images">
        <img src="./<?php echo $dado["caminho_galeria"]; ?>" alt="Main Product Image" class="main-image">
      </div>

      <div class="product-info">
        <div class="product-title">
          <div class="product-title-fav">
            <button><i class="fa-regular fa-heart"></i></button>
          </div>
          <div class="product-title-name">
            <h1><?php echo $dado["nome"]; ?></h1>
          </div>
        </div>
        <hr>
        <p class="product-price">R$ <?php echo $dado["preco_unitario"]; ?></p>
        <p class="product-description">
          <?php
          echo $dado["descricao"];
          ?>
        </p>
        <ul class="product-details-list" style="color:red">
          <li><strong>Dosagem:</strong> 69mg.</li>
          <li><strong>Forma Farmacêutica:</strong> Comprimido.</li>
          <li><strong>Indicação: </strong> <?php echo $dado['descricao'] ?></li>
        </ul>

        <div class="product-actions">
          <div class="product-actions-left">
            <div class="quantity">
              <label for="quantity">Quantidade:</label>
              <input type="number" id="quantity" min="1" value="1">
            </div>
            <div class="add-and-buy">
              <button class="add-to-cart-actions"><i class="bi bi-bag-check"></i> ADICIONAR</button>
              <button class="buy-now"><i class="bi bi-cart-check"></i> COMPRAR</button>
            </div>
          </div>
        </div>
        <div class="action-profile-pharm-container">
          <a href="">
            <div class="action-profile-pharm">
              <img src="./includes/<?php echo $dado['imagem_perfil'] ?>" alt="Icon Loiola" width="60">
              <div class="profile-pharm-desc">
                <h5><?php echo $dado['nome'] ?></h5>
                <span><i class="bi bi-star-fill"> </i><?php echo $dado['avaliacao'] ?></span>
              </div>
            </div>
          </a>
          <div class="action-profile-pharm-functions">
            <button><a href="index.php?pages=profile-farm.php&id-farm=<?php echo $dado["id"]; ?>">Ver
                farmácia</a></button>
          </div>
        </div>
      </div>
    </div>


    <?php
}
?>

  <!-- RSRS 
        <section class="product-reviews">
            <h2>Customer Reviews</h2>
            <div class="review">
                <strong>John Doe</strong> - ★★★★★  
                <p>This product exceeded my expectations! Highly recommended.</p>
            </div>
            <div class="review">
                <strong>Jane Smith</strong> - ★★★★☆  
                <p>Great quality, but the size runs a bit small.</p>
            </div>
        </section> -->

  <br>
  <hr>

  <section class="related-products">
    <h2><i class="fa-solid fa-repeat"></i> Relacionados</h2>

    <div class="products">

      <div class="product-card">
        <div class="product-header">
          <img src="../img/loiola-icon.png" alt="Logo da Drogaria" class="logo">
          <span class="pharmacy-name">Drogaria Loiola</span>
          <span class="favorite"><i class="fa-regular fa-heart"></i></span>
        </div>
        <div class="product-card-image">
          <a href="./review/product-review.html">
            <img src="../img/generico.png" alt="Medicamento">
          </a>
        </div>
        <div class="details">
          <p class="product-name">Medicamento genérico com um nome muito grandeKAKAKAKAKAKAAKAKAKAKAKAKAKAKAL</p>
          <p class="price">R$ 69,24</p>
          <div class="add-to-cart">
            <button class="add-to-cart-btn" onclick="addToCart('Weiva', 24.69, 'img/generico.png', 'Drogaria Loiola')">
              <i class="bi bi-bag-check"></i> ADICIONAR
            </button>
          </div>
        </div>
      </div>


      <div class="product-card">
        <div class="product-header">
          <img src="../img/loiola-icon.png" alt="Logo da Drogaria" class="logo">
          <span class="pharmacy-name">Drogaria Loiola</span>
          <span class="favorite"><i class="fa-regular fa-heart"></i></span>
        </div>
        <div class="product-card-image">
          <a href="./review/product-review.html">
            <img src="../img/generico.png" alt="Medicamento">
          </a>
        </div>
        <div class="details">
          <p class="product-name">Medicamento genérico com um nome muito grandeKAKAKAKAKAKAAKAKAKAKAKAKAKAKAL</p>
          <p class="price">R$ 69,24</p>
          <div class="add-to-cart">
            <button class="add-to-cart-btn" onclick="addToCart('Weiva', 24.69, 'img/generico.png', 'Drogaria Loiola')">
              <i class="bi bi-bag-check"></i> ADICIONAR
            </button>
          </div>
        </div>
      </div>

      <div class="product-card">
        <div class="product-header">
          <img src="../img/loiola-icon.png" alt="Logo da Drogaria" class="logo">
          <span class="pharmacy-name">Drogaria Loiola</span>
          <span class="favorite"><i class="fa-regular fa-heart"></i></span>
        </div>
        <div class="product-card-image">
          <a href="./review/product-review.html">
            <img src="../img/generico.png" alt="Medicamento">
          </a>
        </div>
        <div class="details">
          <p class="product-name">Medicamento genérico com um nome muito grandeKAKAKAKAKAKAAKAKAKAKAKAKAKAKAL</p>
          <p class="price">R$ 69,24</p>
          <div class="add-to-cart">
            <button class="add-to-cart-btn" onclick="addToCart('Weiva', 24.69, 'img/generico.png', 'Drogaria Loiola')">
              <i class="bi bi-bag-check"></i> ADICIONAR
            </button>
          </div>
        </div>
      </div>


    </div>
  </section>
</main>