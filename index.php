<?php
    session_start();
    //Ligação banco de dados
    $usuario = '#';
	$senha = '#';
	$server = '#';
	$bd = '#';

	$conn = new mysqli($server, $usuario, $senha, $bd);
	if (!$conn) {
		echo '<script>alert("Erro de conexão: ");</script>'.$conn->error;
	}
	//Botão excluir
	if(isset($_GET['excluir'])){
	    $sql = 'DELETE FROM usuario WHERE cd= '.$_GET['excluir'];
	    $res = $conn->query($sql);
	    if($res){
	        echo '<script>alert("Deletado com sucesso");</script>';
	    }else{
	        echo '<script>alert("Erro ao excluir");</script>'.$conn->error;
	    }
	}
    //Formulário de cadastro	
	if($_POST){
	        $sql = 'INSERT INTO usuario(nome, email, dt_nasc, senha) values("'.$_POST['nome'].'", "'.$_POST['email'].'", "'.$_POST['dt_nasc'].'", "'.$_POST['passw'].'")';
		    $res = $conn->query($sql);
		    if ($res) {
			echo '<script>alert("Cadastrado com sucesso");</script>';
		    }else{
			echo '<script>alert("Erro ao cadastrar");</script>';
		    }
	    }
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sisteminhas</title>
	<meta charset="utf-8">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container-fluid" id="index">
		<div class="row pt-2 pb-2 bg-dark text-white">
			<div class="col-12">
				<h1 class="text-center">Sisteminha</h1>
			</div>
		</div>
	    
	    <!--FORMULÁRIO DE CADASTRO-->
		<div class="col-5 offset-1 d-block mx-auto mt-5">
			<form class="form" method="post">
				<fieldset>
					<legend>
						Cadastre-se:
					</legend>
					<div class="form-group">
						<label for="user">Nome:</label>
						<input class="form-control" type="text" name="nome" id="nome">
					</div>
					<div class="form-group">
						<label for="user">E-mail:</label>
						<input class="form-control" type="email" name="email" id="email">
					</div>
					<div class="form-group">
						<label for="user">Data de Nascimento:</label>
						<input class="form-control" type="date" name="dt_nasc" id="dt_nasc">
					</div>
					<div class="form-group">
						<label for="user">Senha</label>
						<input class="form-control" type="password" name="passw" id="passw">
					</div><br>
					<div class="form-group">
						<button type="button" class="btn btn-primary">Cadastrar</button>
					</div>
					
					<div class="form-group">
						<a href="login.php">Já possuo cadastro</a>
					</div>
				</fieldset>
				
			</form>
		</div>
		
	    </div>
    </div>
</body>
</html>