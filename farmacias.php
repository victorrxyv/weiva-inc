<section class="pharms-in-app container">
    <h3><i class="fa-solid fa-house-medical" id="icon-h3"></i> Farmácias na região</h3>

    <div class="row">
        <?php
        $sql = "SELECT * FROM farmacia";
        $exeSql = mysqli_query($conn, $sql);
        while ($dado = mysqli_fetch_assoc($exeSql)) {
            ?>
            <div class="col-12 col-md-4 mb-3">
                <div class="card p-3">
                    <div class="row g-0">
                        <div class="col-4">
                            <img src="./includes/<?php echo $dado['imagem_perfil']; ?>" class="img-fluid rounded-start"
                                alt="logo">
                        </div>
                        <div class="col-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $dado['nome']; ?></h5>
                                <p class="card-text">Avaliação: <strong><?php echo $dado['avaliacao']; ?></strong> ⭐</p>
                                <p class="card-text"><small class="text-body-secondary">Contato:
                                        <?php echo $dado['telefone']; ?></small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>