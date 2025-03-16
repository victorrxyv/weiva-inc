<?php
session_start();
include_once("includes/conexao.php");
//include_once("includes/security.php");

?>

<!DOCTYPE html>
<html lang="pt-br">

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
    <link rel="stylesheet" href="./css/review.css">
    <link rel="stylesheet" href="./css/profile.css">

    <!--os elementos estão em ordem de acordo com a páginna, se um elemento está no final da página, o código dele tambem estará-->
</head>

<body>

    <!-- importacao do menu -->
    <header class="px-5">
        <?php include_once('includes/menu.php') ?>
    </header>


    <!-- inicio conteudo pesquisado -->
    <!-- separar esse menu tbm -->
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
                            <a
                                href="index.php?pages=categorias.php&cat-prod=higienePessoal.php&categoria=Higiene Pessoal">
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

                        $pesquisa = isset($_GET['pesquisa']) ? trim($_GET['pesquisa']) : null;

                        if (isset($pesquisa)) {
                            // Escapar a variável para evitar injeções de SQL
                            $pesquisa = mysqli_real_escape_string($conn, $pesquisa);

                            // Corrigindo a consulta SQL
                            $sql = "SELECT p.*, p.id AS pidproduto, p.nome AS pnome, p.descricao AS pdescricao, c.*, c.nome AS cnome, f.*, f.nome AS fnome
                                    FROM produto AS p
                                    INNER JOIN farmacia f ON p.fk_farmacia_id = f.id
                                    INNER JOIN categoria c ON p.fk_categoria_id = c.id
                                    WHERE p.nome LIKE '%" . $pesquisa . "%' 
                                    OR p.descricao LIKE '%" . $pesquisa . "%'
                                    OR f.nome LIKE '%" . $pesquisa . "%'";

                            $exeSql = mysqli_query($conn, $sql);
                            ?>

                            <div class="display-6 py-3 ">
                                <?php echo 'Resultados para: ' . htmlspecialchars($pesquisa == '' ? 'Geral' : $pesquisa); ?>

                            </div>
                            <div class="row g-2">
                                <?php
                                if ($exeSql->num_rows > 0) {
                                    while ($row = $exeSql->fetch_assoc()) {
                                        ?>
                                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">

                                            <div class="product-card">
                                                <div class="product-header">
                                                    <a href="index.php?pages=profile-farm.php&id-farm=<?php echo $row["id"]; ?>"
                                                        class="text-dark">
                                                        <img src="./includes/<?php echo htmlspecialchars($row['imagem_perfil']); ?>"
                                                            alt="<?php echo htmlspecialchars($row['imagem_perfil']); ?>"
                                                            class="logo">
                                                        <span
                                                            class="pharmacy-name"><?php echo htmlspecialchars($row['fnome']); ?></span>
                                                    </a>
                                                    <span class="favorite"><i class="fa-regular fa-heart"></i></span>

                                                </div>
                                                <div class="product-card-image">
                                                    <a
                                                        href="index.php?pages=product-review.php&id-prod=<?php echo $row['pidproduto']; ?>">
                                                        <img src="./<?php echo htmlspecialchars($row['caminho_galeria']); ?>"
                                                            alt="Medicamento">
                                                    </a>
                                                </div>
                                                <div class="details">
                                                    <p class="product-name"><?php echo htmlspecialchars($row['pnome']); ?></p>
                                                    <p class="product-descricao"><?php echo htmlspecialchars($row['pdescricao']); ?>
                                                    </p>
                                                    <p class="price">R$
                                                        <?php echo number_format($row['preco_unitario'], 2, ',', '.'); ?>
                                                    </p>
                                                    <div class="add-to-cart">
                                                        <button class="add-to-cart-btn"
                                                            onclick="addToCart('Weiva', <?php echo $row['preco_unitario']; ?>, 'img/generico.png', '<?php echo htmlspecialchars($row['fnome']); ?>')">
                                                            <i class="bi bi-bag-check"></i> ADICIONAR
                                                            <?php echo $row['pidproduto']; ?>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }

                                } else {
                                    echo "<p>Nenhum produto encontrado.</p>";

                                    // impressao de todos os campos consultados
                                    // while ($dado = mysqli_fetch_assoc($exeSql)) {
                                    //     // Imprime todos os campos retornados
                                    //     foreach ($dado as $campo => $valor) {
                                    //         echo "<strong>$campo:</strong> $valor<br>";
                                    //     }
                                    //     echo "<hr>"; // Separador entre os produtos
                                    // }
                            
                                }
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>






    <!-- inclui a navbar mobile -->
    <header class="px-5">
        <?php include_once('includes/navbarmobile.php') ?>
    </header>

    <footer class="container-fluid bg-dark text-light p-2" style="margin-bottom: 60px;">
        <div class="row">
            <div class="col-12 text-center">
                WEIVA &copy;
            </div>

            <div class="col-12 text-center">2024</div>
        </div>

    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.2/dist/sweetalert2.all.min.js"></script>


</body>

</html>