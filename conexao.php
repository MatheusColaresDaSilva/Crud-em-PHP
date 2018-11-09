<?php
	if($_POST["enviar"] == "Cadastrar"){

		$dbc = mysqli_connect('localhost','root','','crud');

		$sql = "INSERT INTO clientes (cliente_nome, 
									  cliente_sobrenome,
									  cliente_datancto,
									  cliente_cidade, 
									  cliente_renda, 
									  cliente_email,  
									  cliente_senha) 
					VALUES ('{$_POST["nome"]}', 
							'{$_POST["sobrenome"]}',
					        '{$_POST["ncto"]}', 
					        '{$_POST["cidade"]}',
					        '{$_POST["renda"]}',
					        '{$_POST["email"]}',
					        '{$_POST["password"]}')";

        if(mysqli_query($dbc, $sql)){

  			print "<script>alert('Cliente Cadastrado Com Sucesso');</script>";
            print "<script>location.href='index.php';</script>";
		    //header("Location:index.php");
		} 
		else{

			print "<script>alert('Erro ao cadastrar cliente);</script>";
            print "<script>location.href='index.php';</script>";
		    //echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbc);

		}
			 
	    mysqli_close($dbc);					        

	}

	if($_POST["enviar"] == "Editar"){

		$dbc = mysqli_connect('localhost','root','','crud');

		$sql = "UPDATE clientes SET cliente_nome = '{$_POST["nome"]}',
									cliente_sobrenome = '{$_POST["sobrenome"]}',
									cliente_datancto = '{$_POST["ncto"]}',
									cliente_cidade = '{$_POST["cidade"]}',
									cliente_renda = '{$_POST["renda"]}',
									cliente_email = '{$_POST["email"]}',
									cliente_senha = '{$_POST["password"]}'
				WHERE cliente_id = {$_POST["id"]}";		

        if(mysqli_query($dbc, $sql)){

  			print "<script>alert('Cliente Atualizado');</script>";
            print "<script>location.href='visualizar_clientes.php';</script>";		    
		    //header("Location:visualizar_clientes.php");
		} 
		else{

  			print "<script>alert('Problema ao Atualizado Cliente');</script>";
            print "<script>location.href='visualizar_clientes.php';</script>";			    
		    //echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbc);
		}
			 
	    mysqli_close($dbc);					        

	}

	if($_POST["enviar"] == "Excluir"){

		$dbc = mysqli_connect('localhost','root','','crud');

		$sql = "DELETE FROM clientes WHERE cliente_id = {$_POST["id"]}";	


        if(mysqli_query($dbc, $sql)){
		    
		    header("Location:visualizar_clientes.php");
		} 
		else{
		    echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbc);
		}
			 
	    mysqli_close($dbc);					        

	}

?>