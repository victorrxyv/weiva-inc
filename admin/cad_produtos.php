<?php
include_once('../includes/conexao.php')
    ?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Cadastro de Produto</h1>
        <form action="./includes/cadastrar_produto.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do produto"
                    required>
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="4"
                    placeholder="Descrição do produto"></textarea>
            </div>

            <div class="row">
                <div class="col-12 col-md-4 mb-3">
                    <label for="fk_categoria_id" class="form-label">Categoria</label>
                    <select class="form-select" id="fk_categoria_id" name="fk_categoria_id" required>
                        <option value="" selected disabled>Selecione uma categoria</option>
                        <!-- Substitua com opções dinâmicas do banco de dados -->
                        <?php

                        // Query para buscar categorias
                        $sql = "SELECT id, nome FROM categoria";
                        $result = $conn->query($sql);

                        // Adicionar categorias no select
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['id'] . "'>" . htmlspecialchars($row['nome']) . "</option>";
                            }
                        } else {
                            echo "<option value=''>Nenhuma categoria encontrada</option>";
                        }

                        // Fechar conexão
                        $conn->close();
                        ?>
                    </select>
                </div>

                <div class="col-6 col-md-4 mb-3">
                    <label for="preco_unitario" class="form-label">Preço Unitário</label>
                    <input type="number" class="form-control" id="preco_unitario" name="preco_unitario" step="0.01"
                        placeholder="Digite o preço" required>
                </div>

                <div class="col-6 col-md-4 mb-3">
                    <label for="estoque_atual" class="form-label">Estoque Atual</label>
                    <input type="number" class="form-control" id="estoque_atual" name="estoque_atual"
                        placeholder="Quantidade em estoque" required>
                </div>


            </div>

            <div class="row bg-body-secondary rounded p-2">

                <div class="col mb-3">
                    <label class="form-label">Produto Controlado</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="controlado_sim" name="tipo_controlado"
                            value="1">
                        <label class="form-check-label" for="controlado_sim">Sim</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="controlado_nao" name="tipo_controlado"
                            value="0" checked>
                        <label class="form-check-label" for="controlado_nao">Não</label>
                    </div>
                </div>


                <div class=" col mb-3">
                    <label for="registro_anvisa" class="form-label">Registro ANVISA</label>
                    <input type="text" class="form-control" id="registro_anvisa" name="registro_anvisa"
                        placeholder="Digite o registro ANVISA">
                </div>
            </div>

            <div class="row">
                <div class="col mb-3">
                    <label for="lote" class="form-label">Lote</label>
                    <input type="text" class="form-control" id="lote" name="lote" placeholder="Digite o lote" required>
                </div>

                <div class="col mb-3">
                    <label for="estoque_minimo" class="form-label">Estoque Mínimo</label>
                    <input type="number" class="form-control" id="estoque_minimo" name="estoque_minimo"
                        placeholder="Digite o estoque mínimo">
                </div>
            </div>

            <div class="mb-3">
                <label for="validade" class="form-label">Validade</label>
                <input type="date" class="form-control" id="validade" name="validade" required>
            </div>

            <div class="row">
                <div class="col mb-3">
                    <label for="imagem_principal" class="form-label">Imagem Principal</label>
                    <input type="file" class="form-control" id="imagem_principal" name="imagem_principal">
                </div>

                <div class="col mb-3">
                    <label for="galeria" class="form-label">Galeria de Imagens</label>
                    <input type="file" class="form-control" id="galeria" name="galeria[]" multiple>
                </div>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Cadastrar Produto</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>