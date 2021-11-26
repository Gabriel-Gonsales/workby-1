<!DOCTYPE html>
<html>
<head>
	<title>Quem somos?</title>
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
				include 'includes/testemenu.php'
			?>
		</div>
	</div>
	<div class="container" style="min-height: 500px;">
		<div id="caixa_qs" class="col-md-12 list-group-item list-group-item-action text-white bg-dark">	
			<!-- Conteudo //-->
			<h3>Quem somos?</h3>
				<p class="p_qs">Criado em 2021, o WorkBy foi idealizado ao ver as dificuldades de muitos autônomos divulgarem seus trabalhos, construímos um site que possibilitasse com mais facilidade um autônomo ser contratado para serviços esporádicos. </p>
				<p class="p_qs">Desse modo, conseguimos fazer a conexão entre quem precisa de um serviço e um profissional. Nossa missão é que cada vez mais permitir que trabalhadores autônomos tenham acesso a uma ferramenta que os de suporte e ajudem na divulgação de seus serviços. </p>
				<p class="p_qs">Este site não tem fins lucrativos.</p>
		</div>

		<div class="img_contato col-md-12">
			<h3 class="fale_conosco">Fale conosco</h3>
			
			<a href="mailto:gabriel.gonsales@aluno.ifsp.edu.br"><img id="imagem_gabu" src="img/perfilgabu.jpg"></a>
			<a href="mailto:j.octavio@aluno.ifsp.edu.br"><img id="imagem_joao" src="img/perfiljoao.jpg"></a>
			<a href="mailto:julia.toro@aluno.ifsp.edu.br"><img id="imagem_julia" src="img/fotoperfil.jpg"></a>
			<a href="mailto:pedro.cancian@aluno.ifsp.edu.br"><img id="imagem_pedro" src="img/perfilpedro.jpg"></a>
		</div>
		<div class="col-md-12">
			<label id="label_gabu">Gabriel Gonsales</label>
			<label id="label_joao">João Octávio</label>	
			<label id="label_julia">Julia Toro</label>
			<label id="label_pedro">Pedro Cancian</label>		
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