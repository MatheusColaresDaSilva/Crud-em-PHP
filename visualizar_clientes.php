<!DOCTYPE html>
<?php

      $link = mysqli_connect('localhost','root','','crud');
       $sql = "SELECT * FROM clientes";
       $result = mysqli_query($link, $sql);

       while($row = mysqli_fetch_array($result)){
            $clientes[]= $row;

        }

        //var_dump($clientes);
?>

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
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="panel-title">Clientes</div>
                </div>  
                <div class="panel-body" >

                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>Data Nascimento</th>
                        <th>Cidade</th>
                        <th>Renda</th>
                        <th>Email</th>
                        <th>Senha</th>
                        <th colspan="2" style="text-align: center;">Ações</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                    <?php foreach($clientes as $cliente) { ?>
                      <tr>  
                        <td><?= $cliente["cliente_id"]?></td>
                        <td><?= $cliente["cliente_nome"]?></td>
                        <td><?= $cliente["cliente_sobrenome"]?></td>
                        <td><?= $cliente["cliente_datancto"]?></td>
                        <td><?= $cliente["cliente_cidade"]?></td>
                        <td><?= $cliente["cliente_renda"]?></td>
                        <td><?= $cliente["cliente_email"]?></td>
                        <td><?= $cliente["cliente_senha"]?></td>
                        <td>
                          <form name="alterar" action="atualizar_cliente.php" method="POST">
                            <input  type="hidden" name="id" value="<?= $cliente["cliente_id"]?>">
                            <button type="submit" name="enviar" value="Editar" class="btn btn-success">Editar </button></td>
                          </form>
                        <td>
                          <form name="excluir" onclick="return confirm('Confirma Exclusão?');" action="conexao.php" method="POST">
                            <input  type="hidden" name="id" value="<?= $cliente["cliente_id"]?>">
                            <button type="submit" name="enviar" value="Excluir" class="btn btn-danger">Excluir </button>
                          </form>
                        </td>
                      </tr>
                    <?php }?>
                    </tbody>

                </table>

                </div>
            </div> 
        </main>

      </div>
</div>

    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
       