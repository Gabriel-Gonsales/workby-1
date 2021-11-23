<?php
	session_start();
	require_once '../includes/funcoes.php';
	require_once 'conexao_mysql.php';
	require_once 'sql.php';
	require_once 'mysql.php';
	$salt = '$exemplosaltifsp';

	foreach ($_POST as $indice => $dado) {
		$$indice = limparDados($dado);
	}

	foreach ($_GET as $indice => $dado) {
		$$indice = limparDados($dado);
	}

	switch ($acao) {
		case 'insert':
			$dados = [
				'usuario_nome' => $usuario_nome,
				'usuario_email' => $usuario_email,
				'usuario_senha' => crypt($usuario_senha,$salt),
				'usuario_genero' => $usuario_genero,
				'usuario_telefone' => $usuario_telefone,
				'usuario_CPF' => $usuario_CPF,
				'usuario_nascimento' => $usuario_nascimento
			];

			insere(
				'usuario',
				$dados
			);

			break;

		case 'update':
			$id_usuario = (int)$id_usuario;
			$dados = [
				'usuario_nome' => $usuario_nome,
				'usuario_email' => $usuario_email,
				'usuario_senha' => crypt($usuario_senha,$salt),
				'usuario_genero' => $usuario_genero,
				'usuario_telefone' => $usuario_telefone,
				'usuario_CPF' => $usuario_CPF,
				'usuario_nascimento' => $usuario_nascimento
			];

			$criterio = [
				['usuario_id', '=', $usuario_id]
			];

			atualiza(
				'usuario',
				$dados,
				$criterio
			);

			break;

		case 'login':
			$criterio = [
				['usuario_email', '=', $usuario_email],
			];

			$retorno = buscar(
				'usuario',
				['usuario_id', 'usuario_nome', 'usuario_email', 'usuario_senha', 'usuario_adm'],
				$criterio
			);

			if(count($retorno) > 0){
				if(crypt($usuario_senha,$salt) == $retorno[0]['usuario_senha']){
					$_SESSION['login']['usuario'] = $retorno[0];
					if(!empty($_SESSION['url_retorno'])){
						header('Location: ' . $_SESSION['url_retorno']);
						$_SESSION['url_retorno'] = '';
						exit;
					}
				}
			}

			break;

		case 'logout':
			session_destroy();
			break;

		case 'adm':
			$usuario_id = (int)$usuario_id;
			$valor = (int)$valor;

			$dados = [
				'usuario_adm' => $valor
			];

			$criterio = [
				['usuario_id', '=', $usuario_id]
			];

			atualiza(
				'usuario',
				$dados,
				$criterio
			);

			header('Location: ../usuarios.php');
			exit;
			break;
		case 'delete':
			$criterio = [
				['usuario_id','=',$usuario_id]
			];
			deleta(
				'usuario',
				$criterio
			);			
			break;
	}

	header('Location: ../index.php');
?>