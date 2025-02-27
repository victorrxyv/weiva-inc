<?php
include_once('./includes/conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!--icons bootstrap-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!--icons font awesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Weiva PHP</title>
  <link rel="icon" type="image/png" href="./img/phone-icon.png">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/style.css">
  <!--os elementos estão em ordem de acordo com a páginna, se um elemento está no final da página, o código dele tambem estará-->
</head>

<body>

  <header>

    <!--a div "cima" é para deixar o togglemenu, barra de pesquisa, nav e o chat-btn acima da nav-bar do desktop-->

    <div class="cima">
      <div class="menu-hamburger" onclick="toggleMenu()">&#9776;</div>

      <nav class="nav-logo">
        <img src="./img/aweiva.png" alt="Logo">
      </nav>

      <div class="search-bar">
        <input type="text" placeholder="Buscar na Weiva">
        <button><i class="bi bi-search"></i></button>
      </div>

      <div class="header-btn">
        <div class="user-btn-header">
          <div class="user-photo-header">
            <img
              src="https://thumbs.dreamstime.com/b/default-avatar-profile-trendy-style-social-media-user-icon-187599373.jpg"
              width="30">
          </div>
          <div class="user-name-header">
            <p>Olá, bem-vindo(a)!</p>
            <span>Entrar</span>
          </div>
        </div>
        <button class="dark-btn"><i class="bi bi-moon-stars-fill"></i></button>
      </div>

    </div>

    <!--essa div é a mesma que a nav de baixo, porem no header (aparecerá somente na versão de desk-top)-->

    <div class="nav-desktop">
      <a href="home.html">
        <span><i class="bi bi-house-door-fill"></i></span>
        <span>Ínicio</span>
      </a>
      <a href="categoria/cat-med.html">
        <span><i class="bi bi-table"></i></span>
        <span>Categoria</span>
      </a>
      <a href="#">
        <span><i class="bi bi-ticket-perforated"></i></span>
        <span>Cupons</span>
      </a>
      <a href="#">
        <span><i class="bi bi-tags"></i></span>
        <span>Promoções</span>
      </a>
      <a href="#">
        <span><i class="bi bi-shop"></i></span>
        <span>Farmácias</span>
      </a>
      <a href="#">
        <span><i class="bi bi-cart4"></i></span>
        <span>Carrinho</span>
      </a>
      <a href="#">
        <span><i class="bi bi-heart"></i></span>
        <span>Favoritos</span>
      </a>
    </div>

  </header>

  <!--esse é o menu laterl mobile-->

  <nav class="sidebar" id="sidebar">

    <div class="profile-nav">

      <div class="nav-user bg-danger p-5" id="nav-user">
        <div class="pharm-pict">
          <img src="./img/loiola-icon.png" width="50">
        </div>
        <div class="user-desc">
          <p><strong>Wiv</strong></p>
          <span>Meu perfil</span>
        </div>
      </div>
    </div>


    <ul>
      <li><a href="#" class="text-dark"><i class="bi bi-search"></i> Pesquisar</a></li>
      <li><a href="#" class="text-dark"><i class="bi bi-ticket-perforated"></i> Cupons</a></li>
      <li><a href="#" class="text-dark"><i class="bi bi-tags"></i> Ofertas do dia</a></li>
      <li><a href="#" class="text-dark"><i class="bi bi-bag"></i> Minhas Compras</a></li>
      <li><a href="#" class="text-dark"><i class="bi bi-heart"></i> Favoritos</a></li>
      <li><a href="#" class="text-dark"><i class="bi bi-shop"></i> Farmácias</a></li>
      <li><a href="#" class="text-dark"><i class="bi bi-star"></i> Mais vendidos</a></li>
      <li><a href="#" class="text-dark"><i class="bi bi-bell"></i> Notificações</a></li>
      <li><a href="#" class="text-dark"><i class="bi bi-moon"></i> Modo noturno</a></li>
      <hr>
      <li><a href="#" class="text-dark"><i class="bi bi-info-circle"></i> Sobre</a></li>
      <li><a href="#" class="text-dark"><i class="bi bi-person"></i> Contato</a></li>
      <li><a href="#" class="text-dark"><i class="bi bi-chat-square-heart"></i> Feedback</a></li>

    </ul>

    <footer class="container bg-dark text-light p-2">
      <div class="row">
        <div class="col-12 text-center">
          WEIVA &copy;
        </div>

        <div class="col-12 text-center">2024</div>
      </div>

    </footer>
  </nav>

  <!--essa div escurece a tela depois que  toggle-menu é aberto-->

  <div class="overlay" id="overlay" onclick="toggleMenu()"></div>

  <!--carrosel de propaganda-->


  <div class="container-fluid">
    <div class="container">
      <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active" id="carrosel">
            <img src="./img/slide/1.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="./img/slide/2.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="./img/slide/3.png" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>


  <!--fim do carrosel-->

  <!--seção de produtos adicionados ao estoque-->
  <div class="container">


    <section class="new-stock">

      <h3><i class="bi bi-basket-fill" id="icon-h3"></i> Adicionados ao estoque!</h3>


      <?php

      // Executar a consulta PARAMOS AQUI...
      $sql = "SELECT *
        FROM produto
        INNER JOIN (
            SELECT fk_id_farmacia, MAX(data_cadastro) AS ultima_data
            FROM produto
            GROUP BY fk_id_farmacia
        ) sub ON p.fk_id_farmacia = sub.fk_id_farmacia AND p.data_cadastro = sub.ultima_data
        INNER JOIN farmacia f ON p.fk_id_farmacia = f.id";

      $result = $conn->query($sql);

      // Gerar o HTML dinamicamente
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '
        <div class="product-card">
            <div class="product-header">
                <img src="./img/' . htmlspecialchars($row["logo"]) . '" alt="Logo da Farmácia" class="logo">
                <span class="pharmacy-name">' . htmlspecialchars($row["nome_farmacia"]) . '</span>
                <span class="favorite"><i class="fa-regular fa-heart"></i></span>
            </div>
            <div class="product-card-image">
                <img src="./img/' . htmlspecialchars($row["imagem"]) . '" alt="Produto">
            </div>
            <div class="details">
                <p class="product-name">' . htmlspecialchars($row["nome_produto"]) . '</p>
                <p class="price">R$ ' . number_format($row["preco"], 2, ',', '.') . '</p>
                <div class="add-to-cart">
                    <button class="add-to-cart-btn">
                        <i class="bi bi-cart4"></i> ADICIONAR
                    </button>
                </div>
            </div>
        </div>';
        }
      } else {
        echo '<p>Nenhum produto encontrado.</p>';
      }

      // Fechar a conexão
      $conn->close();
      ?>




      <div class="pharm-user">
        <div class="pharm-pict">
          <img src="./img/loiola-icon.png" width="50">
        </div>
        <div class="pharm-desc">
          <p>Drogaria Loiola</p>
          <span><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
              class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></span>
        </div>
      </div>

      <div class="products">

        <div class="product-card">
          <div class="product-header">
            <img src="./img/loiola-icon.png" alt="Logo da Drogaria" class="logo">
            <span class="pharmacy-name">Drogaria Loiola</span>
            <span class="favorite"><i class="fa-regular fa-heart"></i></span>
          </div>
          <div class="product-card-image">
            <img src="./img/generico.png" alt="Medicamento">
          </div>
          <div class="details">
            <p class="product-name">Medicamento genérico com um nome muito grandeKAKAKAKAKAKAAKAKAKAKAKAKAKAKAL</p>
            <p class="price">R$ 69,24</p>
            <div class="add-to-cart">
              <button class="add-to-cart-btn">
                <i class="bi bi-cart4"></i> ADICIONAR
              </button>
            </div>
          </div>
        </div>


        <div class="product-card">
          <div class="product-header">
            <img src="./img/loiola-icon.png" alt="Logo da Drogaria" class="logo">
            <span class="pharmacy-name">Drogaria Loiola</span>
            <span class="favorite"><i class="fa-regular fa-heart"></i></span>
          </div>
          <div class="product-card-image">
            <img src="./img/generico.png" alt="Medicamento">
          </div>
          <div class="details">
            <p class="product-name">Medicamento genérico com um nome muito grandeKAKAKAKAKAKAAKAKAKAKAKAKAKAKAL</p>
            <p class="price">R$ 69,24</p>
            <div class="add-to-cart">
              <button class="add-to-cart-btn">
                <i class="fa-solid fa-basket-shopping"></i> ADICIONAR
              </button>
            </div>
          </div>
        </div>

        <div class="product-card">
          <div class="product-header">
            <img src="./img/loiola-icon.png" alt="Logo da Drogaria" class="logo">
            <span class="pharmacy-name">Drogaria Loiola</span>
            <span class="favorite"><i class="fa-regular fa-heart"></i></span>
          </div>
          <div class="product-card-image">
            <img src="./img/generico.png" alt="Medicamento">
          </div>
          <div class="details">
            <p class="product-name">Medicamento genérico com um nome muito grandeKAKAKAKAKAKAAKAKAKAKAKAKAKAKAL</p>
            <p class="price">R$ 69,24</p>
            <div class="add-to-cart">
              <button class="add-to-cart-btn">
                <i class="fa-solid fa-basket-shopping"></i> ADICIONAR
              </button>
            </div>
          </div>
        </div>

        <div class="product-card">
          <div class="product-header">
            <img src="./img/loiola-icon.png" alt="Logo da Drogaria" class="logo">
            <span class="pharmacy-name">Drogaria Loiola</span>
            <span class="favorite"><i class="fa-regular fa-heart"></i></span>
          </div>
          <div class="product-card-image">
            <img src="./img/generico.png" alt="Medicamento">
          </div>
          <div class="details">
            <p class="product-name">Medicamento genérico com um nome muito grandeKAKAKAKAKAKAAKAKAKAKAKAKAKAKAL</p>
            <p class="price">R$ 69,24</p>
            <div class="add-to-cart">
              <button class="add-to-cart-btn">
                <i class="fa-solid fa-basket-shopping"></i> ADICIONAR
              </button>
            </div>
          </div>
        </div>


        <div class="product-card">
          <div class="product-header">
            <img src="./img/loiola-icon.png" alt="Logo da Drogaria" class="logo">
            <span class="pharmacy-name">Drogaria Loiola</span>
            <span class="favorite"><i class="fa-regular fa-heart"></i></span>
          </div>
          <div class="product-card-image">
            <img src="./img/generico.png" alt="Medicamento">
          </div>
          <div class="details">
            <p class="product-name">Medicamento genérico com um nome muito grandeKAKAKAKAKAKAAKAKAKAKAKAKAKAKAL</p>
            <p class="price">R$ 69,24</p>
            <div class="add-to-cart">
              <button class="add-to-cart-btn">
                <i class="fa-solid fa-basket-shopping"></i> ADICIONAR
              </button>
            </div>
          </div>
        </div>
      </div>




      <!----
        <div class="product-card">
          <div class="farm-user d-flex justify-content-center">
            <div class="row ">
              <div class="col"><img src="./img/loiola-icon.png" height="25px"></div>
              <div class="col">
                <p>Drogaria Loiola</p>
              </div>
              <div class="col"><button class="favoritar"><i class="bi bi-heart"></i></button></div>
            </div>
          </div>

          <div class="product-photo">
            <img class="remedy-defaut" src="./img/remedioDefaut.webp" alt="Remédio">
          </div>
          <div class="product-name" >
            <p style="text-align: justify; white-space: nowrap; text-overflow: ellipsis; overflow: hidden;">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem quaerat consequatur nihil qui provident odit
              possimus id sed quod ab? Et nam iusto iste assumenda ratione consectetur debitis nostrum tempora.
            </p>
          </div>
          <div class="product-price">
            <p>R$ 24,69</p>
          </div>
          <button class="btn btn-danger"><i class="bi bi-basket-fill"></i> ADICIONAR</button>
        </div> 
      </div>-->

    </section>
  </div>





  <div class="container">


    <hr>
    <!--seção de farmácias-->

    <section class="pharms-in-app">
      <h3><i class="fa-solid fa-house-medical" id="icon-h3"></i> Farmácias na região</h3>

      <?php
      // Consulta para obter as farmácias e seus endereços
      $sql = "SELECT * FROM farmacia";

      $exeSql = mysqli_query($conn, $sql);

      ?>
      <div class="pharms">
        <?php while ($dado = mysqli_fetch_assoc($exeSql)) { ?>
          <div class="card-pharm">
            <a href="#">
              <!-- Imagem da farmácia -->
              <img src="<?php echo $dado['imagem_perfil']; ?>" width="70" alt="<?php echo $dado['imagem_perfil']; ?>">
              <p><?php echo $dado['nome']; ?></p>
              <span><i class="bi bi-star-fill"></i> 5</span>
            </a>
          </div>
        <?php } ?>
      </div>
    </section>







  </div>

  <div class="container">

    <hr>


    <!--seção de produtos com desconto-->


    <section class="sales-day">

      <h3><i class="bi bi-tags-fill" id="icon-h3"></i> Ofertas do dia!</h3>
      <div class="products">

        <div class="product-card">
          <div class="farm-user">
            <p>Drogaria Liola</p>
            <button class="favoritar"><i class="bi bi-heart"></i></button>
          </div>
          <div class="product-photo">
            <img class="remedy-defaut" src="./img/remedioDefaut.webp" alt="Remédio">
          </div>
          <div class="product-name">
            uO4nM4KyF4UxazxhYIxtFQ
          </div>
          <div class="product-price-sale">
            <p>R$ 24,69</p>
            <span><s>R$ 69,24</s></span>
          </div>
          <button class="btn btn-danger"><i class="bi bi-basket-fill"></i> ADICIONAR</button>
        </div>

        <div class="product-card">
          <div class="farm-user">
            <p>Drogaria Loiola</p>
            <button class="favoritar"><i class="bi bi-heart"></i></button>
          </div>
          <div class="product-photo">
            <img class="remedy-defaut" src="./img/remedioDefaut.webp" alt="Remédio">
          </div>
          <div class="product-name">
            uO4nM4KyF4UxazxhYIxtFQ
          </div>
          <div class="product-price-sale">
            <p>R$ 24,69</p>
            <span><s>R$ 69,24</s></span>
          </div>
          <button class="btn btn-danger"><i class="bi bi-basket-fill"></i> ADICIONAR</button>
        </div>

        <div class="product-card">
          <div class="farm-user">
            <p>Drogaria Loiola</p>
            <button class="favoritar"><i class="bi bi-heart"></i></button>
          </div>
          <div class="product-photo">
            <img class="remedy-defaut" src="./img/remedioDefaut.webp" alt="Remédio">
          </div>
          <div class="product-name">
            uO4nM4KyF4UxazxhYIxtFQ
          </div>
          <div class="product-price-sale">
            <p>R$ 24,69</p>
            <span><s>R$ 69,24</s></span>
          </div>
          <button class="btn btn-danger"><i class="bi bi-basket-fill"></i> ADICIONAR</button>
        </div>


        <div class="product-card">
          <div class="farm-user">
            <p>Drogaria Loiola</p>
            <button class="favoritar"><i class="bi bi-heart"></i></button>
          </div>
          <div class="product-photo">
            <img class="remedy-defaut" src="./img/remedioDefaut.webp" alt="Remédio">
          </div>
          <div class="product-name">
            uO4nM4KyF4UxazxhYIxtFQ
          </div>
          <div class="product-price-sale">
            <p>R$ 24,69</p>
            <span><s>R$ 69,24</s></span>
          </div>
          <button class="btn btn-danger"><i class="bi bi-basket-fill"></i> ADICIONAR</button>
        </div>
      </div>

    </section>


  </div>
  <!--seção de produtos relacionados a cuidados diários-->

  <div class="container">
    <hr>
    <section class="daily-care">
      <h3><i class="fa-solid fa-pump-medical" id="icon-h3"></i> Cuidados diários </h3>
      <div class="products">

        <div class="product-card">
          <div class="farm-user">
            <p>Drogaria Loiola</p>
            <button class="favoritar"><i class="bi bi-heart"></i></button>
          </div>
          <div class="product-photo">
            <img class="remedy-defaut" src="./img/remedioDefaut.webp" alt="Remédio">
          </div>
          <div class="product-name">
            uO4nM4KyF4UxazxhYIxtFQ
          </div>
          <div class="product-price">
            <p>R$ 24,69</p>
          </div>
          <button class="btn btn-danger"><i class="bi bi-basket-fill"></i> ADICIONAR</button>
        </div>

        <div class="product-card">
          <div class="farm-user">
            <p>Drogaria Loiola</p>
            <button class="favoritar"><i class="bi bi-heart"></i></button>
          </div>
          <div class="product-photo">
            <img class="remedy-defaut" src="./img/remedioDefaut.webp" alt="Remédio">
          </div>
          <div class="product-name">
            uO4nM4KyF4UxazxhYIxtFQ </div>
          <div class="product-price">
            <p>R$ 24,69</p>
          </div>
          <button class="btn btn-danger"><i class="bi bi-basket-fill"></i> ADICIONAR</button>
        </div>

        <div class="product-card">
          <div class="farm-user">
            <p>Drogaria Loiola</p>
            <button class="favoritar"><i class="bi bi-heart"></i></button>
          </div>
          <div class="product-photo">
            <img class="remedy-defaut" src="./img/remedioDefaut.webp" alt="Remédio">
          </div>
          <div class="product-name">
            uO4nM4KyF4UxazxhYIxtFQ </div>
          <div class="product-price-sale">
            <p>R$ 24,69</p>
            <span><s>R$ 69,24</s></span>
          </div>
          <button class="btn btn-danger"><i class="bi bi-basket-fill"></i> ADICIONAR</button>
        </div>
      </div>
    </section>


  </div>
  <!--nav bar mobile-->

  <nav class="nav-mobile">
    <a href="#">
      <span><i class="bi bi-house-door-fill"></i></span>
      <span>Ínicio</span>
    </a>
    <a href="#">
      <span><i class="bi bi-table"></i></span>
      <span>Categoria</span>
    </a>
    <a href="#">
      <span><i class="bi bi-tags"></i></span>
      <span>Promoções</span>
    </a>
    <a href="#">
      <span><i class="bi bi-cart4"></i></span>
      <span>Carrinho</span>
    </a>
    <a href="#">
      <span><i class="bi bi-person-circle"></i></span>
      <span>Conta</span>
    </a>
  </nav>

  <script>
    function toggleMenu() {
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('overlay');
      sidebar.classList.toggle('open');
      overlay.classList.toggle('show');
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</body>

</html>