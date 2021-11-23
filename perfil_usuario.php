<!DOCTYPE html>
<html>
<head>
	<title>Página inicial | Projeto para Web com PHP</title>
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

		      	$criterio = ['fk_usuario_usuario_id', '=', $_SESSION['login']['usuario']['usuario_id']];
			    $posts = buscar(
			        'post',
			        [
			          'post_id',
			          'tiposervico',
			          'contato',
			          'descricao'
			        ],
			        [
			        	$criterio
			        ]
			    );
			    $post = $posts[0];
			?>
		</div>
	</div>
	<div class="container" style="min-height: 500px;">
		<div class="col-md-12" style="padding-top: 50px;">	
			<!-- Conteudo //-->
			<h2>Olá, <?php echo $_SESSION['login']['usuario']['usuario_nome']?>!</h2>
		</div>
		<div class="col-md-12" style="padding-top: 50px;">
			<a class="list-group-item list-group-item-action text-white bg-dark" href="post_detalhe.php?post=<?php echo $post['post_id']?>" style="border-color: yellow; border-style: inset;">
				<h3><?php echo $post['tiposervico']?> </h3>
				<p><?php echo $post['contato']?></p>
				<p><?php echo $post['descricao']?></p>
			</a>
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