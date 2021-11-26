 <!DOCTYPE html>
<html>
<head>
	<title>WorkBy</title>
	<link rel="stylesheet" href="lib/bootstrap-4.2.1-dist/css/bootstrap.min.css">
	<script src="https://kit.fontawesome.com/401c6a38e1.js" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="estilos/estilos.css">
</head>
<body class=" text-white">
	<div class="row">
		<div class="col-md-12">
			<!--Topo //-->
			<?php
				include 'includes/testemenu.php'
			?>
		</div>
	</div>
	<div class="container" style="min-height: 500px;">
		<div class="col-md-12" style="padding-top: 50px;">	
			<!-- Conteudo //-->

			    <?php 
      				require_once 'includes/funcoes.php';
      				require_once 'core/conexao_mysql.php';
      				require_once 'core/sql.php';
     				require_once 'core/mysql.php';
			      	foreach ($_GET as $indice => $dado) {
			        	$$indice = limparDados($dado);
			      	}
					

			      if (!empty($busca)) {
			        $criterio[] = [
			          'tiposervico',
			          'like',
			          "%{$busca}%"
			        ];
			      }
			      else{
			      	$criterio = [];
			      }
			      $posts = buscar(
			        'post',
			        [
			          'fk_usuario_usuario_id',
			          'tiposervico',
			          'contato',
			          'descricao',
			          'post_id',
			          '(select usuario_nome from usuario where usuario.usuario_id = post.fk_usuario_usuario_id) as nome'
			        ],
			        $criterio,
			        'post_id DESC'
			      );
     			?>
			<div>
				<?php if (isset($_SESSION['login'])): ?>
				<?php include 'includes/busca.php';?>
					<h2>Serviços disponíveis</h2>
					<div class="list-group">
						<?php	
							foreach($posts as $post):
						?>
						<a class="list-group-item list-group-item-action text-white bg-dark" href="post_detalhe.php?post_id=<?php echo $post['post_id']?>" style="border-color: yellow; border-style: inset;">
							<h3><?php echo $post['tiposervico']?> </h3>
							<p><?php echo $post['nome']?></p>
							<p><?php echo $post['contato']?></p>
							<p><?php echo $post['descricao']?></p>
						</a>
						<a class="list-group-item list-group-item-action text-white bg-dark" href="avaliacao_formulario.php?id_post=<?php echo $post['post_id']?>" style="border-color: yellow;">
								<i class="far fa-star" style="font-size: 20px; color: yellow; font-weight: bold;"></i> Avaliar
						</a>
						<a class="list-group-item list-group-item-action text-white bg-dark" href="denuncia_formulario.php?id_destinatario=<?php echo $post['post_id']?>" style="border-color: yellow;">
								<i class="far fa-flag" style="font-size: 20px; color: yellow; font-weight: bold;"></i> Denunciar
						</a>
						<br>
					<?php endforeach;?>
					</div>
				<?php else:header('Location: quem_somos.php'); 
				endif; ?>
			</div>
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