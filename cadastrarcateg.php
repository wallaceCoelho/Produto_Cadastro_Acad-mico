<?php
    session_start();
    
    $usuario = '#';
	$senha = '#';
	$server = '#';
	$bd = '#';

	$conn = new mysqli($server, $usuario, $senha, $bd);
	if (!$conn) {
		echo '<script>alert("Erro de conexão: ");</script>'.$conn->error;
	}
	
	if(!isset($_SESSION['nome'])){
	    header('location: login.php');
	}
	if (isset($_GET['sair'])) {
	    header('location: login.php');
	}
	
	if (isset($_GET['excluir'])) {
	    
        $sql = 'DELETE FROM categoria WHERE cd='.$_GET['excluir'];
        $res = $conn->query($sql);

        if ($res)
        {
            echo '<script>alert("Cadastro excluído")</script>';
        }
        else
        {
            echo  "<script>alert('[ERRO] '.$conn->error;)</script>";
        }
    }
	
    if(isset($_POST['cd'])){
        $sql = 'UPDATE categoria SET nome="'.$_POST['categoria'].'"
	    WHERE cd='.$_POST['cd'];
	    $res = $conn -> query($sql);
	    
	    if($res){
	        echo '<script>alert("Cadastrado atualizado");</script>';
	    } else {
	        echo '<script>alert("Erro ao atualizar");</script>';
	    }
	}
	else if(isset($_POST['categoria'])){
	    $sql = 'INSERT INTO categoria(nome) values("'.$_POST['categoria'].'")';
	    $res = $conn->query($sql);
	    
	    if ($res) {
		    echo '<script>alert("Cadastrado com sucesso");</script>';
	    }else{
		    echo '<script>alert("Erro ao cadastrar");</script>';
	    }
	}
?>

<html>
<head>
	<title>Sisteminhas</title>
	<meta charset="utf-8">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    
    <div class="container-fluid bg-light" id="CadastrarCategoria">
		<nav class="navbar navbar-dark navbar-expand-md bg-dark py-3">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bezier">
                        <path fill-rule="evenodd" d="M0 10.5A1.5 1.5 0 0 1 1.5 9h1A1.5 1.5 0 0 1 4 10.5v1A1.5 1.5 0 0 1 2.5 13h-1A1.5 1.5 0 0 1 0 11.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10.5.5A1.5 1.5 0 0 1 13.5 9h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM6 4.5A1.5 1.5 0 0 1 7.5 3h1A1.5 1.5 0 0 1 10 4.5v1A1.5 1.5 0 0 1 8.5 7h-1A1.5 1.5 0 0 1 6 5.5v-1zM7.5 4a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"></path>
                        <path d="M6 4.5H1.866a1 1 0 1 0 0 1h2.668A6.517 6.517 0 0 0 1.814 9H2.5c.123 0 .244.015.358.043a5.517 5.517 0 0 1 3.185-3.185A1.503 1.503 0 0 1 6 5.5v-1zm3.957 1.358A1.5 1.5 0 0 0 10 5.5v-1h4.134a1 1 0 1 1 0 1h-2.668a6.517 6.517 0 0 1 2.72 3.5H13.5c-.123 0-.243.015-.358.043a5.517 5.517 0 0 0-3.185-3.185z"></path>
                    </svg></span><span>Logo</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-5"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-5">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Categorias</a></li>
                    <li class="nav-item"><a class="nav-link" href="produto.php">Produtos</a></li>
                    <li class="nav-item"></li>
                </ul><a class="btn btn-primary ms-md-2" role="button" href="index.php?sair">Sair</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <section class="position-relative py-4 py-xl-5">
                    <p class="text-muted">Gerenciar Categorias</p>
                    <div class="col-md-10 col-xl-4">
                        <div class="card mb-5">
                            <div class="card-body d-flex flex-column align-items-center">
                                
                                <?php
                                    if(isset($_GET['editar'])){
                                        $sql = 'SELECT * FROM categoria WHERE cd='.$_GET['editar'];
                                        $res = $conn->query($sql);
                                        $cat = $res->fetch_object();
                                        ?>
                                            <form class="text-center" method="post">
                                            <!--OCULTO--><input type="hidden" name="cd" value="<?=$cat->cd;?>">
                                                <div class="mb-3">
                                                    <input class="form-control" type="text" name="categoria" value="<?=$cat->nome;?>" placeholder="Nome da Categoria">
                                                </div>
                                                <div class="mb-3"></div>
                                                <div class="mb-3">
                                                    <button class="btn btn-primary d-block w-100" type="submit">Atualizar</button>
                                                </div>
                                            </form>
                                        <?php
                                    }else{
                                ?>
                                    <form class="text-center" method="post">
                                        <div class="mb-3">
                                            <input class="form-control" type="text" name="categoria" placeholder="Nome da Categoria">
                                        </div>
                                        <div class="mb-3"></div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary d-block w-100" type="submit">Cadastrar</button>
                                        </div>
                                    </form>
                                <?php }?>
                                
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#Código</th>
                                <th>#Nome</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                                $sql = 'SELECT * FROM categoria';
                                $resultado = $conn->query($sql);
                                while($categoria = $resultado->fetch_object()){
                                echo '<tr>
                                        <td>'.$categoria->cd.'</td>
                                        <td>'.$categoria->nome.'</td>
                                        <td>
                                            <button type="button" class="btn btn-primary"><a href="?editar='.$categoria->cd.'"></a>Editar</button>
                                            <button type="button" class="btn btn-primary"><a href="?excluir='.$categoria->cd.'"></a>Excluir</button>
                                        </td>
                                    </tr>';
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    
	</div>
	
</body>
</html>