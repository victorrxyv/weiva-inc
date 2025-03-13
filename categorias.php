<main>
  <div class="row">
    <div class="col-3 col-md-2">
      <nav class="sidebar-categoria">
        <ul>
          <li>
            <a href="index.php?pages=categorias.php&cat-prod=medicamentos.php&categoria=all">
              <i class="bi bi-columns-gap"></i>
              <span>Todos</span>
            </a>
          </li>
          <li>
            <a href="index.php?pages=categorias.php&cat-prod=medicamentos.php&categoria=Medicamentos">
              <i class="bi bi-prescription2"></i>
              <span>Medicamentos</span>
            </a>
          </li>
          <li>
            <a href="index.php?pages=categorias.php&cat-prod=higienePessoal.php&categoria=Higiene Pessoal">
              <i class="fa-solid fa-pump-medical"></i>
              <span>Higiene Pessoal</span>
            </a>
          </li>
          <li>
            <a href="index.php?pages=categorias.php&cat-prod=cosmeticos.php&categoria=Cosméticos">
              <i class="fa-solid fa-spray-can-sparkles"></i>
              <span>Cosméticos</span>
            </a>
          </li>
          <li>
            <a href="index.php?pages=categorias.php&cat-prod=fitness.php&categoria=Fitness">
              <i class="fa-solid fa-dumbbell"></i>
              <span>Fitness</span>
            </a>
          </li>
          <li>
            <a href="index.php?pages=categorias.php&cat-prod=maeBebe.php&categoria=Mães e Bebês">
              <i class="fa-solid fa-person-breastfeeding"></i>
              <span>Mães e bebês</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="col">
      <div class="all-pharms">
        <div class="container">
          <?php
          if (isset($_GET['categoria'])) {
            $categoria = $_GET['categoria'];

            if ($categoria == "all") {
              $sql = "SELECT p.*, p.id AS pidproduto, p.nome AS pnome, p.descricao AS pdescricao, 
                             c.*, c.nome AS cnome, f.*, f.nome AS fnome 
                      FROM produto p 
                      INNER JOIN categoria c ON p.fk_categoria_id = c.id 
                      INNER JOIN farmacia f ON p.fk_farmacia_id = f.id";
              $stmt = $conn->prepare($sql);
            } else {
              $sql = "SELECT p.*, p.id AS pidproduto, p.nome AS pnome, p.descricao AS pdescricao, 
                             c.*, c.nome AS cnome, f.*, f.nome AS fnome 
                      FROM produto p 
                      INNER JOIN categoria c ON p.fk_categoria_id = c.id 
                      INNER JOIN farmacia f ON p.fk_farmacia_id = f.id 
                      WHERE c.nome = ?";
              $stmt = $conn->prepare($sql);
              $stmt->bind_param("s", $categoria);
            }

            if ($stmt) {
              $stmt->execute();
              $resultado = $stmt->get_result();
              ?>

              <div class="display-5 py-3 ">
                <?php echo htmlspecialchars($categoria == 'all' ? 'Todos' : $categoria); ?>
              </div>
              <div class="row g-2">
                <?php
                if ($resultado->num_rows > 0) {
                  while ($row = $resultado->fetch_assoc()) {
                    ?>
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">

                      <div class="product-card">
                        <div class="product-header">
                          <img src="./includes/<?php echo htmlspecialchars($row['imagem_perfil']); ?>"
                            alt="<?php echo htmlspecialchars($row['imagem_perfil']); ?>" class="logo">
                          <span class="pharmacy-name"><?php echo htmlspecialchars($row['fnome']); ?></span>
                          <span class="favorite"><i class="fa-regular fa-heart"></i></span>
                        </div>
                        <div class="product-card-image">
                          <a href="index.php?pages=product-review.php&id-prod=<?php echo $row['pidproduto']; ?>">
                            <img src="./<?php echo htmlspecialchars($row['caminho_galeria']); ?>" alt="Medicamento">
                          </a>
                        </div>
                        <div class="details">
                          <p class="product-name"><?php echo htmlspecialchars($row['pnome']); ?></p>
                          <p class="product-descricao"><?php echo htmlspecialchars($row['pdescricao']); ?></p>
                          <p class="price">R$ <?php echo number_format($row['preco_unitario'], 2, ',', '.'); ?></p>
                          <div class="add-to-cart">
                            <button class="add-to-cart-btn"
                              onclick="addToCart('Weiva', <?php echo $row['preco_unitario']; ?>, 'img/generico.png', '<?php echo htmlspecialchars($row['fnome']); ?>')">
                              <i class="bi bi-bag-check"></i> ADICIONAR <?php echo $row['pidproduto']; ?>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php
                  }
                } else {
                  echo "<p>Nenhum produto encontrado para esta categoria.</p>";
                }
                ?>
              </div>
              <?php
              $stmt->close();
            } else {
              echo "Erro na preparação da consulta: " . $conn->error;
            }
            $conn->close();
          } else {
            echo "<p>Categoria não especificada.</p>";
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</main>