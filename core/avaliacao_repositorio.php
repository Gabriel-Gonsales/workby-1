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

$avaliacao_id = (int)$avaliacao_id;

switch ($acao) {
	case 'insert':
		$dados = [
			'avaliacao_descricao'		=> $avaliacao_descricao,
			'avaliacao_nota'			=> $avaliacao_nota,
			'fk_post_post_id'	=> $fk_post_post_id,
			'fk_usuario_usuario_id '	=> $_SESSION['login'] ['usuario'] ['usuario_id']
		];
		insere(
			'avaliacao',
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
			['avaliacao_id','=',$avaliacao_id]
		];
		atualiza(
			'avaliacao',
			$dados,
			$criterio
		);
		break;
	case 'delete':
		$criterio = [
			['avaliacao_id','=',$avaliacao_id]
		];
		deleta(
			'avaliacao',
			$criterio
		);
		break;
}
header('Location: ../index.php');
?>