<header>

    <!--a div "cima" é para deixar o togglemenu, barra de pesquisa, nav e o chat-btn acima da nav-bar do desktop-->

    <div class="cima">
        <div class="menu-hamburger" onclick="toggleMenu()">&#9776;</div>

        <nav class="nav-logo">
            <img src="./img/aweiva.png" alt="Logo">
        </nav>

        <!-- barra depesquisa -->
        <form class="search-bar" action="pesquisa.php" method="GET">
            <input type="search" name="pesquisa" placeholder="Buscar na Weiva">
            <button type="submit"><i class="bi bi-search"></i></button>
        </form>


        <div class="header-btn">
            <div class="user-btn-header">
                <div class="user-photo-header">
                    <img src="https://thumbs.dreamstime.com/b/default-avatar-profile-trendy-style-social-media-user-icon-187599373.jpg"
                        width="30">
                </div>
                <div class="user-name-header">
                    <!-- precisa implementar um dropdown com a opcao meus dadps, minhas compras, perfil, sair -->
                    <?php if (isset($_SESSION['nome'])) {
                        echo '
                        <!--chamar o menu de perfil-->
                        <div class="dropdown">
                        <button class="btn btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        ' . $_SESSION['nome'] . '
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark"">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person-lines-fill"></i> Meu perfil </a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-bag-check"></i> Minhas compras </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="./includes/logout.php">Sair <i class="bi bi-box-arrow-left"></i></a></li>
                        </ul>
                        </div>
                        
                            ';
                    } else {
                        echo '
                        <p>Olá, bem-vindo(a)!</p>
                        <a href="./login.php">
                        <span>Entrar</span>
                        </a>
                    ';
                    } ?>


                </div>
            </div>
            <!-- <button class="dark-btn"><i class="bi bi-moon-stars-fill"></i></button> -->
        </div>

    </div>

    <!--essa div é a mesma que a nav de baixo, porem no header (aparecerá somente na versão de desk-top)-->
    <!-- para o menu funcioar corretamente seguir o seguinte cdg index.php?pages=paginaClicada.php exceto no link index.php-->
    <div class="nav-desktop">
        <a href="index.php">
            <span><i class="bi bi-house-door-fill"></i></span>
            <span>Ínicio</span>
        </a>
        <a href="index.php?pages=categorias.php&cat-prod=medicamentos.php&categoria=all">
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
        <a href="index.php?pages=farmacias.php">
            <span><i class="bi bi-shop"></i></span>
            <span>Farmácias</span>
        </a>
        <a href="./cart.html">
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
                <img src="https://thumbs.dreamstime.com/b/default-avatar-profile-trendy-style-social-media-user-icon-187599373.jpg"
                    width="50" style="border-radius: 50%;">
            </div>

            <div class="user-desc" style="color: white;">
                <?php if (isset($_SESSION['nome'])) {
                    echo '<p>Ola, ' . $_SESSION['nome'] . '</p>';
                    echo '
                        <a href="#"><!--chamar o menu de perfil-->
                        <span>MINHA CONTA <i class="bi bi-caret-down-fill"></i></span>
                        </a><br>
                        <a href="./includes/logout.php">
                        <span><i class="bi bi-box-arrow-left"></i> SAIR</span>
                        </a>
                            ';
                } else {
                    echo '
                        <p>Olá, bem-vindo(a)!</p>
                        <a href="./login.php">
                        <span>Entrar</span>
                        </a>
                    ';
                } ?>
                </a>
            </div>
        </div>
    </div>


    <ul>
        <li><a href="#" class="text-dark"><i class="bi bi-search"></i> Pesquisar</a></li>
        <li><a href="#" class="text-dark"><i class="bi bi-chat-dots"></i> Mensagens</a></li>
        <li><a href="#" class="text-dark"><i class="bi bi-ticket-perforated"></i> Cupons</a></li>
        <li><a href="#" class="text-dark"><i class="bi bi-tags"></i> Ofertas do dia</a></li>
        <li><a href="#" class="text-dark"><i class="bi bi-bag"></i> Minhas Compras</a></li>
        <li><a href="#" class="text-dark"><i class="bi bi-heart"></i> Favoritos</a></li>
        <li><a href="#" class="text-dark"><i class="bi bi-geo-alt"></i> Meus endereços</a></li>
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