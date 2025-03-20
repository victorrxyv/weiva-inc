<h2>Gerenciamento de Farmacias</h2>
<?php
if (isset($_SESSION['msn'])) {
    echo $_SESSION['msn'];
    unset($_SESSION['msn']);
}
?>




<table id="usuariosTable" class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $sqlUsuario = mysqli_query($conn, "SELECT * FROM farmacia");

        while ($dd = mysqli_fetch_assoc($sqlUsuario)) {
            ?>
            <tr>
                <td><?php echo $dd['id'] ?></td>
                <td><?php echo $dd['nome'] ?></td>
                <td><?php echo $dd['email'] ?></td>
                <td>

                    <a href="./includes/atualizar_status_farmacia.php?id=<?php echo $dd['id']; ?>&ativo=<?php echo $dd['ativo'] == 1 ? 1 : 0; ?>"
                        onclick="return confirm('Tem certeza de que deseja atualizar o status deste usuário?');"
                        class="btn btn-custom <?php echo $dd['ativo'] == 1 ? 'btn-success' : 'btn-danger'; ?>">
                        <i class="bi <?php echo $dd['ativo'] == 1 ? 'bi-check-circle' : 'bi-ban'; ?>"></i>
                    </a>

                    <a href='editar_farmacia.php?id=<?php echo $dd['id'] ?>' class='btn btn-custom btn-warning'>
                        <i class="bi bi-pencil-square"></i> Editar
                    </a>

                    <a href='deletar_farmacia.php?id=<?php echo $dd['id'] ?>' class='btn btn-custom btn-danger'
                        onclick="return confirm('Tem certeza de que deseja excluir este usuário?');">
                        <i class="bi bi-trash3"></i> Excluir
                    </a>
                </td>
            </tr>

        <?php }
        ?>
    </tbody>
</table>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function () {
        $('#usuariosTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
            },
            "paging": true,
            "searching": true,
            "lengthMenu": [10, 25, 50, 100],
            "pageLength": 10
        });
    });
</script>