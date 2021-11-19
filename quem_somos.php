<!DOCTYPE html>
<html>
<head>
	<title>Página inicial | Projeto para Web com PHP</title>
	<link rel="stylesheet" href="lib/bootstrap-4.2.1-dist/css/bootstrap.min.css">
	<script src="https://kit.fontawesome.com/401c6a38e1.js" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet"> 
</head>
<body class="bg-dark text-white">
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
			<h3 class="quem_somos" style="color: #fcff00">Quem somos?</h3>
				<p style="margin-right: 10px; margin-left: 20px;">Criado em 2021, o WorkBy foi idealizado ao ver as dificuldades de muitos autônomos divulgarem seus trabalhos, construímos um site que possibilitasse com mais facilidade um autônomo ser contratado para serviços esporádicos. </p>
				<p style="margin-right: 10px; margin-left: 20px;">Desse modo, conseguimos fazer a conexão entre quem precisa de um serviço e um profissional. Nossa missão é que cada vez mais permitir que trabalhadores autônomos tenham acesso a uma ferramenta que os de suporte e ajudem na divulgação de seus serviços. </p>
		</div>

		<div class="col-md-12" style="padding-top: 20px;">
			<h4 class="quem_somos" style="color: #fcff00;">Fale conosco</h4>
			
			<img src="perfilgabu.jpg" style="height: 150px; border-radius: 50%; border: 2px solid #fcff00; float: left; margin-top: 25px;">
			<img src="perfiljoao.jpg" style="height: 150px; border-radius: 50%; border: 2px solid #fcff00; margin-top: 25px; margin-left: 125px; ">
			<img src="fotoperfil.jpg" style="height: 150px; border-radius: 50%; border: 2px solid #fcff00;  margin-top: 25px; margin-right: 150px; margin-left: 125px;">
			<img src="perfilpedro.jpg" style="height: 150px; border-radius: 50%; border: 2px solid #fcff00; float: right; margin-top: 25px; margin-right: 50px;">	
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