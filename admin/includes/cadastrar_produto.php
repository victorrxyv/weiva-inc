<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('../../includes/conexao.php');

    // Recebendo os dados do formulário
    $nome = $conn->real_escape_string($_POST["nome"]);
    $descricao = $conn->real_escape_string($_POST["descricao"]);
    $preco_unitario = $_POST["preco_unitario"];
    $estoque_atual = $_POST["estoque_atual"];
    $fk_categoria_id = $_POST["fk_categoria_id"];
    $tipo_controlado = $_POST["tipo_controlado"];
    $registro_anvisa = $conn->real_escape_string($_POST["registro_anvisa"]);
    $lote = $conn->real_escape_string($_POST["lote"]);
    $estoque_minimo = $_POST["estoque_minimo"];
    $validade = $_POST["validade"];

    // Upload de imagens
    $imagem_principal = null;
    if (isset($_FILES["imagem_principal"]) && $_FILES["imagem_principal"]["error"] == 0) {
        $imagem_principal = "uploads/" . basename($_FILES["imagem_principal"]["name"]);
        move_uploaded_file($_FILES["imagem_principal"]["tmp_name"], $imagem_principal);
    }

    $galeria = null;
    if (isset($_FILES["galeria"])) {
        $galeria_paths = [];
        foreach ($_FILES["galeria"]["tmp_name"] as $key => $tmp_name) {
            if ($_FILES["galeria"]["error"][$key] == 0) {
                $file_path = "uploads/" . basename($_FILES["galeria"]["name"][$key]);
                move_uploaded_file($tmp_name, $file_path);
                $galeria_paths[] = $file_path;
            }
        }
        $galeria = implode(",", $galeria_paths);
    }

    // Query de inserção
    $sql = "INSERT INTO produto (
                nome, descricao, preco_unitario, estoque_atual, fk_categoria_id, 
                tipo_controlado, registro_anvisa, lote, estoque_minimo, validade, 
                imagem_principal, caminho_galeria
            ) VALUES (
                '$nome', '$descricao', $preco_unitario, $estoque_atual, $fk_categoria_id, 
                $tipo_controlado, '$registro_anvisa', '$lote', $estoque_minimo, '$validade', 
                '$imagem_principal', '$galeria'
            )";

    if ($conn->query($sql) === TRUE) {
        echo "Produto cadastrado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    // Fechando a conexão
    $conn->close();
}
?>
