<h2>Gerenciamento de Produtos</h2>
<table id="produtosTable" class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Estoque</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $sqlProduto = mysqli_query($conn, "SELECT * FROM produto");
        while ($dd = mysqli_fetch_assoc($sqlProduto)) {
            ?>
            <tr>
                <td><?php echo $dd['id'] ?></td>
                <td><?php echo $dd['nome'] ?></td>
                <td><?php echo $dd['estoque_atual'] ?></td>
                <td>
                    <a href='editar_produto.php?id=<?php echo $dd['id'] ?>' class='btn btn-warning btn-sm'><i
                            class="bi bi-pencil-square"></i> Editar</a>
                    <a href='deletar_produto.php?id=<?php echo $dd['id'] ?>' class='btn btn-danger btn-sm'><i
                            class="bi bi-trash3"></i> Excluir</a>
                </td>
            </tr>
            <?php
        }
        $conn->close();
        ?>
    </tbody>
</table>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8"
    src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8"
    src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8"
    src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/searchpanes/2.0.0/js/dataTables.searchPanes.min.js"></script>
<script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/select/1.3.4/js/dataTables.select.min.js"></script>
<script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/searchbuilder/1.3.4/js/dataTables.searchBuilder.min.js"></script>

<script>

    $(document).ready(function () {
        $('#produtosTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
            },
            "paging": true,
            "searching": true,
            "lengthMenu": [10, 25, 50, 100],
            "pageLength": 10,
            dom: 'Bfrtip',
            buttons: [
                'pdf'
            ],
            searchPanes: {
                viewTotal: true,
                layout: 'columns-4'
            },
            layout: {
                top1: {
                    searchPanes: {
                        container: '#searchPanes'
                    }
                },
                top2: ['searchBuilder']
            },
            searchBuilder: true,
            columnDefs: [
                {
                    searchPanes: {
                        show: true
                    },
                    targets: [1, 2]
                }
            ],
        });
    });
</script>