<!DOCTYPE html>
<html>
	<head>
		<title>Post | Projeto para Web com PHP</title>
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
					include 'includes/valida_login.php';
				?>
			</div>
		</div>
		<div class="container" style="min-height: 500px;">
			<div style="padding-top: 30px;">
				<?php
					require_once 'includes/funcoes.php';
					require_once 'core/conexao_mysql.php';
					require_once 'core/sql.php';
					require_once 'core/mysql.php';

					foreach ($_GET as $indice => $dado) {
						$$indice = limparDados($dado);
					}
					$data_atual = date('Y-m-d H:i:s');
					if (!empty($id)) {
						$id = (int)$id;

						$criterio = [
							['id', '=', $id]
						];

						$retorno = buscar(
							'post',
							['*'],
							$criterio
						);

						$entidade = $retorno[0];
					}
				?>
				<h2>Denúncia</h2>
				<form method="post" action="core/post_repositorio.php">
					<input type="hidden" name="acao"
					       value="<?php echo empty($id) ? 'insert' : 'update' ?>">
					<input type="hidden" name="id"
					       value="<?php echo $entidade['id'] ?? '' ?>">
					<div class="form_group">
						<label for="conteudo">Conteúdo</label>
						<textarea class="form_control col-md-12" type="text"
						          require="required" id="conteudo" name="conteudo">
						          <?php echo $entidade['conteudo'] ?? '' ?>	
						</textarea>
						<br>
					</div>
					<?php  
						$entidade['data'] = $data_atual;
						$entidade['id_destinatario'] = $id_destinatario;
					?>
					<button class="btn col-md-12 text-dark" type="submit" style="background-color: yellow;">Salvar</button>
				</form>
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