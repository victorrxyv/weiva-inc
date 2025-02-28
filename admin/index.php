<?php
session_start();
include_once("includes/conexao.php");
//include_once("includes/security.php");

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--icons bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!--icons font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Weiva</title>
    <link rel="icon" type="image/png" href="./img/phone-icon.png">
    <!-- personaliza o topo -->
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/categoria.css">
    <link rel="stylesheet" href="./css/style.css">

    <!--os elementos estão em ordem de acordo com a páginna, se um elemento está no final da página, o código dele tambem estará-->
</head>

<body>

    <!-- importacao do menu -->
    <header class="px-5">
        <?php include_once('includes/menu.php') ?>
    </header>



    <!--carrosel de propaganda aparece em todas as paginas?-->
    <div class="container-fluid">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
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

    <!-- inclui o conteudo da pagina caso a pagina exista -->
    <div class="container">


        <?php
        @$pagina = $_GET['pages'];

        if (isset($pagina)) {
            include $pagina;
        } else {
            ?>

            <!-- feedback usuario -> exiibir a pagina inicial em caso de erro ou a 404 -->

            <div class="container">
                <hr>
                <!--seção de farmácias-->
                <section class="pharms-in-app">
                    <h3><i class="fa-solid fa-house-medical" id="icon-h3"></i> Farmácias na região</h3>

                    <div class="pharms">
                        <?php
                        $sql = "SELECT * FROM farmacia";
                        $exeSql = mysqli_query($conn, $sql);
                        $dd = mysqli_fetch_assoc($exeSql);
                        while ($dado = mysqli_fetch_assoc($exeSql)) {
                            ?>
                            <div class="card-pharm">
                                <a href="#">
                                    <img src="./includes/<?php echo $dado['imagem_perfil'] ?>" width="70" alt="logo">
                                    <p><?php echo $dado['nome'] ?></p>
                                    <span><i class="bi bi-star-fill"> </i><?php echo $dado['avaliacao'] ?></span>
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
                    </div>
                </section>
            </div>

            <!--seção de produtos relacionados a cuidados diários-->
            <div class="container">
                <hr>
                <section class="daily-care">
                    <h3><i class="fa-solid fa-pump-medical" id="icon-h3"></i> Cuidados diários </h3>
                    <div class="products">

                    </div>
                </section>
            </div>

            <?php
        }
        ?>

    </div>


    <!--seção de produtos adicionados ao estoque-->
    <!----
  <div class="container">

    <section class="new-stock">

      <h3><i class="bi bi-basket-fill" id="icon-h3"></i> Adicionados ao estoque!</h3>

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
            <a href="./review/product-review.html">
              <img src="./img/generico.png" alt="Medicamento">
            </a>
          </div>
          <div class="details">
            <p class="product-name">Medicamento genérico com um nome muito grandeKAKAKAKAKAKAAKAKAKAKAKAKAKAKAL</p>
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
      </div> -->

    </section>
    </div>



    <!-- inclui a navbar mobile -->
    <header class="px-5">
        <?php include_once('includes/navbarmobile.php') ?>
    </header>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.2/dist/sweetalert2.all.min.js"></script>

</body>

</html>