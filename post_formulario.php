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
					if (!empty($post_id)) {
						$post_id = (int)$post_id;

						$criterio = [
							['post_id', '=', $post_id]
						];

						$retorno = buscar(
							'post',
							['*'],
							$criterio
						);

						$entidade = $retorno[0];
					}
				?>
				<h2>Post</h2>
				<form method="post" action="core/post_repositorio.php">
					<input type="hidden" name="acao"
					       value="<?php echo empty($post_id) ? 'insert' : 'update' ?>">
					<input type="hidden" name="id"
					       value="<?php echo $entidade['post_id'] ?? '' ?>">
					<div class="form_group">
						<label for="titulo">Tipo de serviço</label>
						<select class="form_control col-md-12" type="text" 
						       require="required" id="tiposervico" name="tiposervico"
						       value="<?php echo $entidade['tiposervico'] ?? '' ?>">
						    <option value="Tecnologia da informação">Tecnologia da informação</option>
						    <option value="Elétrica">Elétrica</option>
							<option value="Serviços domésticos">Serviços domésticos</option>
							<option value="Construção civil">Construção civil</option>
							<option value="Instalação e montagem">Instalação e montagem</option>
							<option value="Artes e design">Artes e design</option>
							<option value="Beleza e bem-estar">Beleza e bem-estar</option>
							<option value="Eventos">Eventos</option>
						</select>
					</div>
					<div class="form_group">
						<label for="contato">Contato</label>
						<textarea class="form_control col-md-12" type="text"
						          require="required" id="contato" name="contato">
						          <?php echo $entidade['contato'] ?? '' ?>	
						</textarea>
					</div>
					<div class="form_group">
						<label for="descricao">Descrição</label>
						<textarea class="form_control col-md-12" type="text"
						          require="required" id="descricao" name="descricao">
						          <?php echo $entidade['descricao'] ?? '' ?>	
						</textarea>
					</div>
					<?php  
						$entidade['data_post'] = $data_atual;
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