<?php
	require_once '../core/sql.php';

	$id = 1;
	$nome = 'Gabriel';
	$email = 'gahgonsales43@gmail.com';
	$senha = '123gabu';
	$dados = ['nome' => $nome,
			  'email' => $email,
			  'senha' => $senha];
	$entidade = 'usuario';
	$criterio = [['id', '=', $id]];
	$campos = ['id', 'nome', 'email'];
	print_r($dados);
	echo '<br>';
	print_r($campos);
	echo '<br>';
	print_r($criterio);
	echo '<br>';

	//Teste geração INSERT
	$instrucao = insert($entidade, $dados);
	echo $instrucao.'<br>';

	//TESTE geração UPDATE
	$instrucao = update($entidade, $dados, $criterio);
	echo $instrucao.'<br>';

	///Teste geração SELECT
	$instrucao = select($entidade, $campos, $criterio);
	echo $instrucao.'<br>';

	// TESTE geração DELETE
	$instrucao = delete($entidade, $criterio);
	echo $instrucao.'<br>';
?>