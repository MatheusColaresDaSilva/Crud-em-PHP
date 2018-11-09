<!DOCTYPE html>
<?php

       $dbc = mysqli_connect('localhost','root','','crud');
       $sql = "SELECT * FROM clientes WHERE cliente_id =".$_POST["id"];
       $resul = $dbc->query($sql);
       $dbc->close();

       $cliente = mysqli_fetch_assoc($resul);


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
                            <div class="panel-title">Cadastrar Cliente</div>
                        </div>  
                        <div class="panel-body" >
                            <form id="signupform" name="cliente" class="form-horizontal" role="form" action="conexao.php" method="POST">
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Erro:</p>
                                    <span></span>
                                </div>
                  
                                <div class="form-group">
                                    <label for="nome" class="col-md-3 control-label">Nome</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="nome" value="<?=$cliente["cliente_nome"]?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="sobrenome" class="col-md-3 control-label">Sobrenome</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="sobrenome" value="<?=$cliente["cliente_sobrenome"]?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="ncto" class="col-md-3 control-label">Data Nascimento</label>
                                    <div class="col-md-9">
                                        <input type="date" class="form-control" value="<?=$cliente["cliente_datancto"]?>" name="ncto">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="cidade" class="col-md-3 control-label">Cidade</label>
                                    <div class="col-md-9">
                                        <!--<input type="text" class="form-control" name="cidade">-->
                                        <select class="form-control" name="cidade">
                                          <option value="Maringa">Maringa</option>
                                          <option value="Cascavel">Cascavel</option>
                                          <option value="Curitiba">Curitiba</option>
                                          <option value="Barretos">Barretos</option>
                                          <option value="<?=$cliente["cliente_cidade"]?>" selected><?=$cliente["cliente_cidade"]?></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="renda" class="col-md-3 control-label">Renda</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="<?=$cliente["cliente_renda"]?>" name="renda">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">E-mail</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="<?=$cliente["cliente_email"]?>" name="email" placeholder="exemplo@gmail.com">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Senha</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" value="<?=$cliente["cliente_senha"]?>" name="password" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <input id="btn-signup" type="hidden" name="id" value="<?=$cliente["cliente_id"]?>">
                                        <input type="submit" value="Editar" name="enviar" class="btn btn-info">
                                    </div>
                                </div>
                                                                   
                            </form>
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
       