<?php
session_start();
include_once("conexao.php");
//include_once("security.php");
$email = mysqli_real_escape_string($conn, $_POST['email']);
$senha = mysqli_real_escape_string($conn, $_POST['password']);

//criptografar senha no banco na criacao do usuario 
//$senha =  md5(md5(mysqli_real_escape_string($conn, $_POST['pass'])));

$sql = "SELECT id, nome, role FROM usuario WHERE email = ? AND senha_hash = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $senha);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
    $_SESSION['id'] = $usuario['id'];
    $_SESSION['nome'] = $usuario['nome'];
    $_SESSION['role'] = $usuario['role'];

    // Redirecionamento conforme o role
    switch ($usuario['role']) {
        case 'usuario':
            header("Location: ../index.php");
            break;
        case 'admin':
            header("Location: ../adm-farm/index.php");
            break;
        case 'super_admin':
            header("Location: ../admin/index.php");
            break;
        default:
            echo "Erro: Função de usuário inválida!";
    }
} else {
    echo "Usuário ou senha incorretos!";
}

$stmt->close();
$conn->close();
?>