<!DOCTYPE HTML>
<?php
	require_once 'includes/funcoes.php';
	require_once 'core/conexao_mysql.php';
	require_once 'core/sql.php';
	require_once 'core/mysql.php';

	foreach ($_GET as $indice => $dado) {
		$$indice = limparDados($dado);
	}
	$criterio = [['avaliacao_id', '>=',1]];


	$post = buscar(
		'post',
		[
          'tiposervico',
          'contato',
          'descricao',
          '(select usuario_nome from usuario where usuario.usuario_id = post.fk_usuario_usuario_id) as nome'
		],
		[
			['post_id', '=', $post]
		]
	);

  	$avaliacoes = buscar(
    'avaliacao',
    [
      'fk_usuario_usuario_id',
      'avaliacao_nota',
      'avaliacao_descricao',
      'avaliacao_id',
      'avaliacao_data',
      '(select usuario_nome from usuario where usuario.usuario_id = avaliacao.fk_usuario_usuario_id) as nome'
    ],
    [
    	$criterio,
    	'avaliacao_data DESC'
	]
  );
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
	</head>
	<body class="bg-dark text-white">
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
					<h5 class="card-tittle"><?php echo $post['tiposervico']?></h5>
					<h5 class="card-subtittle mb-2 text-muted">
						Por <?php echo $post['nome']?>
					</h5>
					<div class="card-text">
						<?php echo html_entity_decode($post['contato']) ?>
						<br>
						<?php echo html_entity_decode($post['descricao']) ?>
					</div>
				</div>
			<h4>Avaliações</h4>
			<div class="col-md-12" style="padding-top: 50px;">
				<?php foreach($avaliacoes as $avaliacao): ?>
				<div class="card-body">
					<h5 class="card-tittle"><?php echo $avaliaco['avaliacao_nota']?></h5>
					<h5 class="card-subtittle mb-2 text-muted">
						Por <?php echo $avaliacao['nome']?> em <?php echo $avaliacao['avaliacao_data']?>
					</h5>
					<div class="card-text">
						<?php echo html_entity_decode($avaliacao['avaliacao_descricao']) ?>
						<br>				
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