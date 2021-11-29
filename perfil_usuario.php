<!DOCTYPE html>
<html>
<head>
	<title>Perfil</title>
	<link rel="stylesheet" href="lib/bootstrap-4.2.1-dist/css/bootstrap.min.css">
	<script src="https://kit.fontawesome.com/401c6a38e1.js" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="estilos/estilos.css">
</head>
<body class="text-white">
	<div class="row">
		<div class="col-md-12">
			<!--Topo //-->
			<?php
				include 'includes/testemenu.php';
  				require_once 'includes/funcoes.php';
  				require_once 'core/conexao_mysql.php';
  				require_once 'core/sql.php';
 				require_once 'core/mysql.php';
		      	foreach ($_GET as $indice => $dado) {
		        $$indice = limparDados($dado);
		      	}

		      	$criterio1 = ['fk_usuario_usuario_id', '=', $_SESSION['login']['usuario']['usuario_id']];
		      	$criterio2 = ['usuario_id', '=', $_SESSION['login']['usuario']['usuario_id']];

			    $posts = buscar(
			        'post',
			        [
			          'post_id',
			          'tiposervico',
			          'contato',
			          'descricao'
			        ],
			        [
			        	$criterio1
			        ]
			    );
				$usuarios = buscar(
					'usuario',
					[
						'usuario_nome',
						'usuario_email',
						'usuario_nascimento',
						'usuario_CPF',
						'usuario_telefone',
						'usuario_genero'
					],
					[
						$criterio2
					]
				);
				$usuario = $usuarios[0];
			    $post = $posts[0];

				$data = date_create($usuario['usuario_nascimento']);
				$data = date_format($data, 'd/m/Y');
			?>

		</div>
	</div>
	<div class="container" style="min-height: 500px;">
		<div class="col-md-12" style="padding-top: 15px;">	
			<!-- Conteudo //-->
			<h2>Olá, <?php echo $_SESSION['login']['usuario']['usuario_nome']?>!</h2>
		</div>
		<div class="col-md-12">
			<a class="list-group-item list-group-item-action text-white bg-dark" href="post_detalhe.php?post_id=<?php echo $post['post_id']?>" style="border-color: yellow; border-style: inset;">
				<h3>Serviço: <?php echo $post['tiposervico']?> </h3>
				<p>Contato: <?php echo $post['contato']?></p>
				<p>Descrição do serviço: <?php echo $post['descricao']?></p>
			</a>
		<form method="post" action="post_formulario.php?post_id=<?php echo $post['post_id']?>">
			<button class="btn col-md-12 text-dark" type="submit" style="background-color: yellow;">Editar dados</button>			
		</form>
		</div>
		<br>
		<h2 style="margin-left: 13px;">Dados pessoais</h2>
		<div class="col-md-12" style="padding-bottom: 10px;">
			<a class="list-group-item text-white bg-dark" style="border-color: yellow; border-style: inset;">
				<p>Nome: <?php echo $usuario['usuario_nome']?> </p>
			</a>
			<a class="list-group-item text-white bg-dark" style="border-color: yellow; border-style: inset;">
				<p>CPF: <?php echo $usuario['usuario_CPF']?></p>
			</a>
			<a class="list-group-item text-white bg-dark" style="border-color: yellow; border-style: inset;">
				<p>Telefone: <?php echo $usuario['usuario_telefone']?></p>
			</a>
			<a class="list-group-item text-white bg-dark" style="border-color: yellow; border-style: inset;">
				<p>Nascimento: <?php echo $data?></p>
			</a>
			<a class="list-group-item text-white bg-dark" style="border-color: yellow; border-style: inset;">
				<p>Gênero: <?php echo $usuario['usuario_genero']?></p>
			</a>
			<a class="list-group-item text-white bg-dark" style="border-color: yellow; border-style: inset;">
				<p>Email: <?php echo $usuario['usuario_email']?></p>
			</a>
			<form method="post" action="usuario_formulario.php">
				<button class="btn col-md-12 text-dark" type="submit" style="background-color: yellow;">Editar dados</button>			
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<!--Rodapé//-->
			<?php 
				include 'includes/rodape.php';
			?>
		</div>
	</div>
	<script src="lib/bootstrap-4.2.1-dist/js/boostrap.min.js"></script>
</body>
</html>