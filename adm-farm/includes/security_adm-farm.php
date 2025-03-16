<?php
if (
    ($_SESSION['id'] == "") || ($_SESSION['nome'] == "") || ($_SESSION['email'] == "") || ($_SESSION['senha'] == "") || ($_SESSION['role'] == "") || ($_SESSION['role'] != "admin")
) {

    $_SESSION['login_erro'] = '
    <div class="alert alert-danger alert-dismissible fade show text-wrap" role="alert">
        <strong>Erro!</strong> <br>Permissão necessaria!<br>
        <strong>Contate um administrador.</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"</button>
    </div>';

    unset(
        $_SESSION['id'],
        $_SESSION['nome'],
        $_SESSION['email'],
        $_SESSION['senha'],
        $_SESSION['role']
    );

    header("Location: ../login.php");
}