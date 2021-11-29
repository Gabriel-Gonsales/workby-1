<!DOCTYPE HTML>
<?php
	require_once 'includes/funcoes.php';
	require_once 'core/conexao_mysql.php';
	require_once 'core/sql.php';
	require_once 'core/mysql.php';

	foreach ($_GET as $indice => $dado) {
		$$indice = limparDados($dado);
	}
	$criterio = [];


	$posts = buscar(
		'post',
		[
          'tiposervico',
          'contato',
          'descricao',
          '(select usuario_nome from usuario where usuario.usuario_id = post.fk_usuario_usuario_id) as nome'
		],
		[
			['post_id', '=', $post_id]
		]
	);



  	$avaliacoes = buscar(
    'avaliacao',
    [
      'fk_usuario_usuario_id',
      'avaliacao_nota',
      'avaliacao_descricao',
      'avaliacao_id',
      '(select usuario_nome from usuario where usuario.usuario_id = avaliacao.fk_usuario_usuario_id) as nome'
    ],
    [
    	['fk_post_post_id', '=', $post_id]
		]
  );
  $post = $posts[0];
?>

<html>
	<head>
		<title><?php echo $post['tiposervico']?></title>
		<link rel="stylesheet" 
			  href="lib/bootstrap-4.2.1-dist/css/bootstrap.min.css">
		<script src="https://kit.fontawesome.com/401c6a38e1.js" crossorigin="anonymous"></script>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet"> 
		<link rel="stylesheet" type="text/css" href="estilos/estilos.css">	
	</head>
	<body class="text-white">
		<div class="row">
			<div class="col-md-12">
				<?php
					include 'includes/testemenu.php';
				?>
			</div>
		</div>
		<div class="container" style="min-height: 500px;">
			<div class="col-md-12" style="padding-top: 50px;">
				<div class="card-body">
					<h3 class="card-tittle"><?php echo $post['tiposervico']?></h3>
					<h5 class="card-subtittle mb-2 text-muted">
						Por <?php echo $post['nome']?>
					</h5>
					<div class="card-text">
						<?php echo $post['contato']?>
						<hr style="border-color: yellow;">
						<p style="font-family: serif;"><?php echo $post['descricao'] ?></p>
					</div>
				</div>
			<h4>Avaliações</h4>
			<div class="col-md-12" style="padding-top: 10px;">
				<?php foreach($avaliacoes as $avaliacao): ?>
				<div>
						<h5 class="card-tittle" style="color: yellow;"><?php echo $avaliacao['avaliacao_nota']?></h5>
					<h5 class="card-subtittle mb-2 text-muted">
						Por <?php echo $avaliacao['nome']?>
					</h5>
					<div class="card-text">
						<?php echo $avaliacao['avaliacao_descricao']?>
						<br><br>				
				</div>
				<?php endforeach;?>
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