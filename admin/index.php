<?php
session_start();
include_once("../includes/conexao.php");
include_once("./includes/security_admin.php");
?>
<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Weiva Admin</title>
  <link rel="icon" type="image/png" href="../includes/img/phone-icon.png">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/searchpanes/2.0.0/css/searchPanes.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.4/css/select.dataTables.min.css">
  <link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/searchbuilder/1.3.4/css/searchBuilder.dataTables.min.css">

  <style>
    body {
      display: flex;
    }

    .sidebar {
      width: 250px;
      height: 100vh;
      background: #343a40;
      color: white;
      padding: 15px;
      position: fixed;
      transition: width 0.3s;
    }

    .sidebar.collapsed {
      width: 80px;
    }

    .sidebar a {
      color: white;
      text-decoration: none;
      padding: 10px;
      display: flex;
      align-items: center;
      border-radius: 5px;
      white-space: nowrap;
    }

    .sidebar a:hover {
      background: #495057;
    }

    .sidebar i {
      font-size: 1.5rem;
      margin-right: 10px;
    }

    .sidebar.collapsed i {
      margin-right: 0;
    }

    .sidebar span {
      transition: opacity 0.3s, width 0.3s;
    }

    .sidebar.collapsed span {
      opacity: 0;
      width: 0;
      overflow: hidden;
    }

    .sidebar.collapsed a:hover span {
      opacity: 1;
      width: auto;
      margin-left: 10px;
      background: rgba(0, 0, 0, 0.7);
      padding: 5px 10px;
      border-radius: 5px;
      position: absolute;
      left: 80px;
      white-space: nowrap;
    }

    .toggle-btn {
      position: absolute;
      top: 10px;
      right: -20px;
      background: #495057;
      border: none;
      color: white;
      padding: 5px 10px;
      cursor: pointer;
      border-radius: 5px;
    }

    .content {
      margin-left: 260px;
      padding: 20px;
      width: 100%;
      transition: margin-left 0.3s;
    }

    .collapsed+.content {
      margin-left: 90px;
    }
  </style>
</head>

<body>
  <div class="sidebar" id="sidebar">
    <button class="toggle-btn" onclick="toggleMenu()">
      <i class="bi bi-list"></i>
    </button>
    <h4 class="text-center">Admin</h4>
    <a href="index.php"><i class="bi bi-house-door"></i> <span>Dashboard</span></a>
    <a href="index.php?pages=usuarios.php"><i class="bi bi-people"></i> <span>Usuários</span></a>
    <a href="index.php?pages=produtos.php"><i class="bi bi-box-seam"></i> <span>Produtos</span></a>
    <a href="index.php?pages=farmacias.php"><i class="bi bi-prescription2"></i> <span>Farmacias</span></a>
    <a href="index.php?pages=configuracao.php"><i class="bi bi-gear"></i> <span>Configurações</span></a>
    <a href="./includes/logout.php"><i class="bi bi-box-arrow-right"></i> <span>Sair</span></a>
  </div>
  <div class="content">
    <?php
    $pagina = isset($_GET['pages']) ? $_GET['pages'] : null;

    if (isset($pagina)) {
      include_once $pagina;
    } else {
      ?>
      <!-- INICIO CONSULTAS -->
      <?php
      $sqlUsuario = mysqli_query($conn, "SELECT count(id) AS qntUsu FROM usuario");
      $sqlProduto = mysqli_query($conn, "SELECT count(id) AS qntProd FROM produto");
      $sqlFarmacia = mysqli_query($conn, "SELECT count(id) AS qntFarm FROM farmacia");
      $du = mysqli_fetch_assoc($sqlUsuario);
      $dp = mysqli_fetch_assoc($sqlProduto);
      $df = mysqli_fetch_assoc($sqlFarmacia);

      ?>
      <!-- FIM CONSULTAS -->

      <h2>Bem-vindo, <?php echo $_SESSION['nome'] ?></h2>
      <p>Aqui você pode gerenciar o sistema.</p>


      <h2>Dashboard</h2>

      <!-- Cards de Informações -->
      <div class="row">
        <div class="col-md-3">
          <div class="card text-white bg-primary mb-3">
            <div class="card-body">
              <h5 class="card-title">Usuários</h5>
              <p class="card-text fs-3"><?php echo $du['qntUsu'] ?></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-white bg-success mb-3">
            <div class="card-body">
              <h5 class="card-title">Produtos</h5>
              <p class="card-text fs-3"><?php echo $dp['qntProd'] ?></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-white bg-warning mb-3">
            <div class="card-body">
              <h5 class="card-title">Farmacias</h5>
              <p class="card-text fs-3"><?php echo $df['qntFarm'] ?></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-white bg-danger mb-3">
            <div class="card-body">
              <h5 class="card-title">Faturamento</h5>
              <p class="card-text fs-3">R$ 12.450</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Gráficos -->
      <div class="row">
        <div class="col-md-6">
          <canvas id="salesChart"></canvas>
        </div>
        <div class="col-md-6">
          <canvas id="usersChart"></canvas>
        </div>
      </div>

      <!-- Tabela de Pedidos Recentes -->
      <h3 class="mt-4">Últimos Pedidos</h3>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Cliente</th>
            <th>Produto</th>
            <th>Valor</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>João Silva</td>
            <td>Smartphone</td>
            <td>R$ 2.500</td>
            <td><span class="badge bg-success">Enviado</span></td>
          </tr>
          <tr>
            <td>2</td>
            <td>Maria Oliveira</td>
            <td>Notebook</td>
            <td>R$ 4.200</td>
            <td><span class="badge bg-warning">Pendente</span></td>
          </tr>
        </tbody>
      </table>





      <?php
    }
    ?>
  </div>

  <!-- Scripts -->
  <script>
    function toggleMenu() {
      document.getElementById('sidebar').classList.toggle('collapsed');
    }

    // Gráfico de Vendas
    var ctx1 = document.getElementById('salesChart').getContext('2d');
    new Chart(ctx1, {
      type: 'line',
      data: {
        labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai'],
        datasets: [{
          label: 'Vendas',
          data: [300, 500, 700, 900, 1200],
          borderColor: 'blue',
          fill: false
        }]
      }
    });

    // Gráfico de Usuários
    var ctx2 = document.getElementById('usersChart').getContext('2d');
    new Chart(ctx2, {
      type: 'doughnut',
      data: {
        labels: ['Ativos', 'Inativos'],
        datasets: [{
          data: [120, 30],
          backgroundColor: ['green', 'red']
        }]
      }
    });
  </script>

  <script>
    function toggleMenu() {
      document.getElementById('sidebar').classList.toggle('collapsed');
    }
  </script>
</body>

</html>