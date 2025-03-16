<?php
session_start();
include_once("conexao.php");
//include_once("security.php");
$email = mysqli_real_escape_string($conn, $_POST['email']);
$senha = mysqli_real_escape_string($conn, $_POST['password']);

//criptografar senha no banco na criacao do usuario 
//$senha =  md5(md5(mysqli_real_escape_string($conn, $_POST['pass'])));

$sqlLogar = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM usuario WHERE email = '$email' AND senha_hash = '$senha'"));
if (empty($sqlLogar)) {
    $_SESSION['msn'] = '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Atenção!</strong> e-mail e/ou senha incorretos! 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
       ';
    header("Location:../login.php");
} else {


    $cpf = md5(md5(str_replace('.', '', str_replace('-', '', $sqlLogar['cpf']))));
    //verificar se o usuario esta ativo -- igualmente para a farmacia
    if ($senha == $cpf) {
        $_SESSION['id'] = $sqlLogar['id'];
        $_SESSION['nome'] = $sqlLogar['nome'];
        $_SESSION['cpf'] = $sqlLogar['cpf'];
        $_SESSION['email'] = $sqlLogar['email'];
        $_SESSION['senha'] = $sqlLogar['senha'];
        $_SESSION['role'] = $sqlLogar['role'];

        $_SESSION['msn'] = '
        <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
            <strong>Atenção!</strong> sua senha foi redefinida por um administrador! <br>
                Altere sua senha!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        header("Location: ../home.php?pages=perfil.php&seguranca");
    } else {
        echo $sqlLogar['id'];
        echo '<br>';
        echo $sqlLogar['nome'];
        echo '<br>';
        echo $sqlLogar['cpf'];
        echo '<br>';
        echo $sqlLogar['email'];
        echo '<br>';
        echo $sqlLogar['senha_hash'];
        echo '<br>';
        echo $sqlLogar['role'];
        echo '<br>';
        $_SESSION['id'] = $sqlLogar['id'];
        $_SESSION['nome'] = $sqlLogar['nome'];
        $_SESSION['cpf'] = $sqlLogar['cpf'];
        $_SESSION['email'] = $sqlLogar['email'];
        $_SESSION['senha'] = $sqlLogar['senha'];
        $_SESSION['role'] = $sqlLogar['role'];

        header("Location: ../");
    }
}