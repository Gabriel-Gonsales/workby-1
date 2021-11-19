<!DOCTYPE html>
<html>
<head>
	<title>Usuários | Projeto para Web com PHP</title>
	<link rel="stylesheet" href="lib/bootstrap-4.2.1-dist/css/bootstrap.min.css">
	<script src="https://kit.fontawesome.com/401c6a38e1.js" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet"> 
</head>
<body class="bg-dark text-white">
	<div class="row">
		<div class="col-md-12">
			<?php
				include 'includes/testemenu.php';
			?>
		</div>
		<div class="row">
		<div class="col-md-12">
			<?php
				include 'includes/valida_login.php';
				if ($_SESSION['login'] ['usuario'] ['usuario_adm'] !==1) {
				 	header('Location: index.php');
				 } 
			?>
		</div>
	</div>
	<div class="container">
		<div class="row">
		</div>
		<div class="container" style="min-height: 500px;">
			<div class="col-md-10" style="padding-top: 50px;">
				<h2>Denúncias</h2>
				<?php include 'includes/busca.php';?>
				<?php 
					require_once 'includes/funcoes.php';
					require_once 'core/conexao_mysql.php';
					require_once 'core/sql.php';
					require_once 'core/mysql.php';

					foreach ($_GET as $indice => $dado) {
						$$indice = limparDados($dado);
					}

					$criterio = [];

					if (!empty($busca)) {
						$criterio[] = ['id', 'like', "%{$busca}%"];
					}

					$result = buscar(
						'denuncia',
						[
							'id',
							'conteudo',
							'id_destinatario',
							'fk_usuario_id',
							'(select usuario_cpf from usuario where usuario.usuario_id = denuncia.fk_usuario_id) as CPF'
						],
						$criterio,
						'id ASC'
					);
				?>
				<br>
				<table class="table table-borded table-hover table-striped table-responsive{-sm|-md|-lg|-xl}">
					<thead>
						<tr>
							<td>Id da denúncia</td>
							<td>Id de destino</td>
							<td>Autor (CPF)</td>
							<td>Conteudo</td>
							<td>Resolução</td>
						</tr>
					</thead>
					<tbody>
						<?php 
							foreach ($result as $entidade):
						?>
						<tr>
							<td><?php echo $entidade['id']?></td>
							<td><?php echo $entidade['id_destinatario']?></td>
							<td><?php echo $entidade['CPF']?></td>
							<td><?php echo $entidade['conteudo']?></td>
							<td><a href='core/denuncia_repositorio.php?acao=delete&id=<?php echo $entidade['id']?>'>Resolvido</a></td>
						</tr>
					<?php endforeach;?>
					</tbody>		
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php
					include 'includes/rodape.php';
				?>
			</div>
		</div>
	</div>
	<script src="lib/bootstrap-4.2.1-dist/js/bootstrap.min.js"></script>
</body>
</html>