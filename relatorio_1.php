<?php

       $dbc = mysqli_connect('localhost','root','','crud');
       $sql = "SELECT * FROM clientes ORDER BY cliente_renda DESC";
       $result = mysqli_query($dbc, $sql);

        $listnome = array();
        $listrenda = array();

       $i = 0;
       while($row = mysqli_fetch_array($result)){
            $listnome[$i]= $row["cliente_nome"];
            $listrenda[$i]= $row["cliente_renda"];

            $i = $i + 1;

        }

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">CRUD</a>
      <ul class="navbar-nav px-3">
      </ul>
 </nav>


<div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
            
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Operacional</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="cadastro_cliente.php">
                  <span data-feather="home"></span>Cadastrar Cliente<span class="sr-only">(current)</span>
                </a>
              </li>
            </ul>

            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="visualizar_clientes.php">
                  <span data-feather="home"></span>Visualizar Cliente<span class="sr-only">(current)</span>
                </a>
              </li>              
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Análise</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="relatorio_1.php">
                  <span data-feather="file-text"></span> Relatório Por Cliente
                </a>
              </li>
            </ul>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="relatorio_2.php">
                  <span data-feather="file-text"></span> Relatório Por Cidade
                </a>
              </li>
            </ul>
          </div>
 
             <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Conexão</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
              <form action="create_database.php" method="post">
                  <button type="submit" class="btn btn-danger">  Criar Banco de Dados </button>
              </form>
              </li>
            </ul>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
              <form action="create_table.php" method="post">
                  <button type="submit" class="btn btn-primary">  Criar Tabela "CLIENTES" </button>
              </form>
              </li>
            </ul>
        </nav>
     
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

                    <div id="columnchart_material" style="width: 800px; height: 500px;"></div> 

        </main>

      </div>
</div>

    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Cliente', 'Renda'],

          <?php
          $k = $i;

          for($i = 0; $i <$k ; $i++){ ?>

          ['<?php echo $listnome[$i] ?>', <?php echo $listrenda[$i] ?>],

          <?php } ?>
        ]);

        var options = {
          chart: {
            title: 'Renda Dos Clientes',
            subtitle: 'Relação do poder aquisitivo dos nossos clientes',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }


     </script>

</html>
