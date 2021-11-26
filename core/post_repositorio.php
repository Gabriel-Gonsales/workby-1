<?php 
session_start();
require_once '../includes/valida_login.php';
require_once '../includes/funcoes.php';
require_once 'conexao_mysql.php';
require_once 'sql.php';
require_once 'mysql.php';

foreach ($_POST as $indice => $dado) {
	$$indice = limparDados($dado);
}

foreach ($_GET as $indice => $dado) {
	$$indice = limparDados($dado);
}

$post_id = (int)$post_id;

switch ($acao) {
	case 'insert':
	echo $_SESSION['login'] ['usuario'] ['usuario_id'];
		$dados = [
			'tiposervico'		=> $tiposervico,
			'contato'			=> $contato,
			'descricao'			=> $descricao,
			'fk_usuario_usuario_id'	=> $_SESSION['login'] ['usuario'] ['usuario_id']
		];
		insere(
			'post',
			$dados
		);
		break;
	case 'update':
		$dados = [
			'tiposervico'		=> $tiposervico,
			'contato'			=> $contato,
			'descricao'			=> $descricao
		];
		$criterio = [
			['post_id','=',$post_id]
		];
		atualiza(
			'post',
			$dados,
			$criterio
		);
		break;
	case 'delete':
		$criterio = [
			['post_id','=',$post_id]
		];
		deleta(
			'post',
			$criterio
		);
		break;
}
	header('Location: ../index.php');
?>