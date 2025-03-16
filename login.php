<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weiva | Login </title>
    <link rel="icon" type="image/png" href="./img/phone-icon.png">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Weiva | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <main>
        <div class="up">
            <img src="./includes/img/Insurance-pana.png" alt="Logo">
        </div>

        <div class="lado-1">
            <div class="login-painel">
                <span>
                    <a href="./index.php" style="text-decoration:none; color: #c11515;"><i
                            class="bi bi-caret-left-fill"></i> Voltar</a>
                </span>
                <form method="post" action="./includes/logar.php">
                    <h1>Conectar à Weiva!</h1>
                    <label for="email">Email</label>
                    <input type="email" placeholder="Exemplo: joao@gmail.com" name="email" id="email" required>
                    <label for="password">Senha</label>
                    <input type="password" placeholder="*******" name="password" id="password" required>
                    <button type="submit" class="btn btn-danger">Entrar</button>
                    <div>
                        <?php
                        if (isset($_SESSION['login_erro'])) { ?>

                            <div class="row">
                                <div class="col">
                                    <?php echo $_SESSION['login_erro']; ?>
                                </div>
                            </div>

                            <?php
                            unset($_SESSION['login_erro']);
                        }


                        if (isset($_SESSION['msn'])) {
                            echo $_SESSION['msn'];
                            unset($_SESSION['msn']);
                        }
                        ?>
                    </div>
                    <div class="creat-accont">
                        <span>Não tem uma conta?</span>
                        <a href="new-accont.html">Criar conta</a>
                    </div>
                </form>
                <div class="divider"><span>OU</span></div>
                <div class="another-login">
                    <!--preguiça de botar imagem-->
                    <button><img
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/2048px-2021_Facebook_icon.svg.png"
                            width="30" alt="Facebook"></button>
                    <button><img src="https://www.cdnlogo.com/logos/g/35/google-icon.svg" width="30" alt="Google">
                    </button>
                    <button><img src="https://cdn.worldvectorlogo.com/logos/linkedin-icon.svg" width="30"
                            alt="Linkedin"> </button>
                </div>
            </div>
        </div>
        <div class="lado-2">
            <img src="./includes/img/Insurance-pana.png" alt="Login">
        </div>

    </main>


    <footer>
        &copy; WEIVA - 2024
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>