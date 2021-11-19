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

$id = (int)$id;

switch ($acao) {
	case 'insert':
		$dados = [
			'conteudo'		=> $conteudo,
			'id_destinatario'			=> $id_destinatario,
			'data'	=> $data_atual,
			'fk_usuario_usuario_id '	=> $_SESSION['login'] ['usuario'] ['usuario_id']
		];
		insere(
			'denuncia',
			$dados
		);
		break;
	case 'update':
		$dados = [
			'conteudo'		=> $conteudo,
			'id_destinatario'			=> $id_destinatario,
			'data'	=> "$data_denuncia $hora_denuncia"
		];
		$criterio = [
			['denuncia_id','=',$denuncia_id]
		];
		atualiza(
			'denuncia',
			$dados,
			$criterio
		);
		break;
	case 'delete':
		$criterio = [
			['denuncia_id','=',$denuncia_id]
		];
		deleta(
			'denuncia',
			$criterio
		);
		break;
}
header('Location: ../index.php');
?>