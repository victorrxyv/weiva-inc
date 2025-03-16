<h2>Gerenciamento de Farmacias</h2>
<table id="usuariosTable" class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ativo</th>
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
                    <a
                        href="atualizar_status_usuario.php?id=<?php echo $dd['id']; ?>&ativo=<?php echo $dd['ativo'] == 1 ? 0 : 1; ?>">
                        <?php echo $dd['ativo'] == 1 ? '<i class="bi bi-check-circle text-success"></i>' : '<i class="bi bi-ban text-danger"></i>' ?>
                    </a>
                </td>
                <td>
                    <a href='editar_farmacia.php?id=<?php echo $dd['id'] ?>' class='btn btn-warning btn-sm'><i
                            class="bi bi-pencil-square"></i> Editar</a>
                    <a href='deletar_farmacia.php?id=<?php echo $dd['id'] ?>' class='btn btn-danger btn-sm'><i
                            class="bi bi-trash3"></i> Excluir</a>
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