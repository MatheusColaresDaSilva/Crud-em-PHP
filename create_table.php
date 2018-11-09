<?php

$dbc = mysqli_connect('localhost','root','','crud');

$sql = "CREATE TABLE IF NOT EXISTS clientes (
           cliente_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
           cliente_nome varchar(50) NOT NULL,
           cliente_sobrenome varchar(50) NOT NULL,
           cliente_cidade varchar(50) NOT NULL,
           cliente_datancto DATE NOT NULL,
           cliente_renda varchar(14),
           cliente_email VARCHAR(100) NOT NULL,
           cliente_senha VARCHAR(100) NOT NULL
           )";

//$result = mysqli_query($dbc,$sql) or die("ERRO : $sql");

        if(mysqli_query($dbc, $sql)){
           
        print "<script>alert('Tabela Clientes Criada Com Sucesso');</script>";
        print "<script>location.href='index.php';</script>";
          
        } else{
            echo "Erro ao executar: $sql " . mysqli_error($dbc);

        }

//header("Location:index.php");

?>