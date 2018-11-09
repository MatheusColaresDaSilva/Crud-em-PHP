<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = new mysqli($servername, $username, $password);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    // Create database
    $sql = "CREATE DATABASE crud";
      if ($conn->query($sql) === TRUE) {
        
        print "<script>alert('Banco de Dados Criado Com Sucesso');</script>";
        print "<script>location.href='index.php';</script>";
      } 
      else {
        
        echo "Error ao criar Banco de Dados: " . $conn->error;
      }

    $conn->close();

?>