<main>
  <div class="row">
    <div class="col-3 col-md-2">
      <nav class="sidebar-categoria">
        <ul>
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
          <!-- ================================================================= -->
          <?php

          // index.php (Página principal)
          
          // Inclui o arquivo de categorias dinamicamente
          if (isset($_GET['page'])) {
            $pagina = $_GET['page'];
            include $pagina . ".php";
          }

          ?>

          <?php

          // categorias.php (Página de categorias)
          
          if (isset($_GET['categoria'])) {
            $categoria = $_GET['categoria'];

            // Consulta SQL (usando prepared statements para segurança)
            //$sql = "SELECT * FROM produto WHERE fk_categoria_id = (SELECT id FROM categoria WHERE nome = ?)";
            //$sql = "SELECT p.*, p.nome as pnome, c.* FROM produto p INNER JOIN categoria c ON p.fk_categoria_id = c.id WHERE c.nome = ?";
            $sql = "SELECT p.*, p.id AS pidproduto, p.nome AS pnome, p.descricao AS pdescricao, c.*, c.nome AS cnome, f.*, f.nome AS fnome FROM produto p INNER JOIN categoria c ON p.fk_categoria_id = c.id INNER JOIN farmacia f ON p.fk_farmacia_id = f.id  WHERE c.nome = ?";

            $stmt = $conn->prepare($sql);

            if ($stmt) {
              $stmt->bind_param("s", $categoria);
              $stmt->execute();
              $resultado = $stmt->get_result();
              ?>

              <div class="container">
                <div class="display-5 py-3"><?php echo $categoria; ?></div>
                <div class="row g-4">

                  <?php
                  if ($resultado->num_rows > 0) {
                    while ($row = $resultado->fetch_assoc()) { ?>


                      <!-- teste -->

                      <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 d-flex justify-content-center">
                        <div class="product-card">
                          <div class="product-header">
                            <img src="./includes/<?php echo $row['imagem_perfil']; ?>"
                              alt="<?php echo $row['imagem_perfil']; ?>" class="logo">
                            <span class="pharmacy-name"><?php echo $row['fnome']; ?></span>
                            <span class="favorite"><i class="fa-regular fa-heart"> <?php echo $row['pidproduto']; ?></i></span>
                          </div>
                          <div class="product-card-image">
                            <a href="./review/product-review.html&id-prod=<?php echo $row['pidproduto']; ?>">
                              <img src="./<?php echo $row['caminho_galeria']; ?>" alt="Medicamento">
                            </a>
                          </div>
                          <div class="details">
                            <p class="product-name"><?php echo $row['pnome']; ?></p>

                            <!-- adicionado manualmente, verificar comportamento -->
                            <p class="product-descricao"><?php echo $row['pdescricao']; ?></p>

                            <p class="price">R$ <?php echo $row['preco_unitario']; ?></p>
                            <div class="add-to-cart">
                              <button class="add-to-cart-btn"
                                onclick="addToCart('Weiva', 24.69, 'img/generico.png', 'Drogaria Loiola')">
                                <i class="bi bi-bag-check"></i> ADICIONAR <?php echo $row['pidproduto']; ?>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- teste -->

                      <?php
                      //listar farmacia com o fk
                      // echo $row['fk_farmacia_id']
                      // echo $row['descricao'];
              
                      // echo "<h2>Dados do registro:</h2>";
                      // echo "<ul>";
                      // foreach ($row as $campo => $valor) {
                      //   echo "<li><strong>" . $campo . ":</strong> " . $valor . "</li>";
                      // }
                      // echo "</ul>";
              
                    } ?>
                  </div>
                </div>

                <?php


                  } else {
                    echo "<p>Nenhum produto encontrado para esta categoria.</p>";
                  }

                  $stmt->close();
            } else {
              echo "Erro na preparação da consulta: " . $conn->error;
            }

            $conn->close();
          } else {
            echo "<p>Categoria não especificada.</p>";
            echo "<p>Aqui pode mostar tudo ao mesmo tempo.</p>";
          }

          ?>

          <!-- ================================================================= -->

        </div>

      </div>
    </div>
  </div>

</main>