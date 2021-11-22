<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login | Projeto para Web com PHP</title>
		<link rel="stylesheet"
			  href="lib/bootstrap-4.2.1-dist/css/bootstrap.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="estilos/estilos.css">
</head>
<body class=" text-white">
	<div class="row">
		<div class="col-md-12">
			<?php include 'includes/testemenu.php'; ?>
		</div>
	</div>
	<div class="container" style="min-height: 500px;">
		<div style="padding-top: 30px;">
			<h2>Login</h2>
			<div class="card-body">
				<form method="post" action="core/usuario_repositorio.php">
					<input type="hidden" name="acao" value="login">
					<div class="form-group">
						<label for="email">E-mail</label>
						<input class="form-control" type="text" require="required" id="email" name="usuario_email">
					</div>
					<div class="form-group">
						<label for="senha">Senha</label>
						<input class="form-control" type="password" require="required" id="senha" name="usuario_senha">
					</div>
					<div class="text-right">
						<button class="btn col-md-12 text-dark" type="submit" style="background-color: yellow;">Acessar</button>
					</div>
				</form>
			</div>		
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?php
				include 'includes/rodape.php';
			?>
		</div>
	</div>
	<script src="lib/bootstrap-4.2.1-dist/js/bootstrap.min.js"></script>
</body>
</html>